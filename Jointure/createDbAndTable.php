<?php
header('Access-Control-Allow-Origin: *');					//pour autoriser le site client à utiliser le flux html

$method = $_SERVER['REQUEST_METHOD'];						//request method -> envoie de la méthode de requete -> POST ou GET ou autres (head, put, delete, connect, ...)
//$input = file_get_contents('php://input');					//file_get_contents -> lire un flux  - php://input lit les données lors d'un post

define( 'DB_NAME', 'jointureSimple' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_TABLE', 'user' );
define( 'DB_TABLE2', 'language' );

//echo isset($_POST['url']);

if(isset($_POST['url']) && !empty($_POST['url']) ){
	$users = json_decode(file_get_contents($_POST['url']));

	// connexion à Mysql sans base de données
	$pdo = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
	
	// création de la requête sql
	// on teste avant si elle existe ou non (par sécurité)
	$requete = "CREATE DATABASE IF NOT EXISTS ".DB_NAME." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
	
	// on prépare et on exécute la requête
	$pdo->prepare($requete)->execute();

	echo '<p>DATABASE ' . DB_NAME . ' CREEE !</p>'; 

	// connexion à la bdd
	$connexion1 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	$connexion2 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
 	
	if($connexion2){
		// on créer la requête
		$requete2 = "CREATE TABLE IF NOT EXISTS ".DB_NAME.".".DB_TABLE2." (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
																		name VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		creation_date DATE NOT NULL) 
																		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
																		
		// on prépare et on exécute la requête
		$connexion2->prepare($requete2)->execute();
		echo '<p>TABLE ' . DB_TABLE2 . ' CREEE !</p>'; 
		$connexion2 = null;
	}

	// on vérifie que la connexion est bonne
	if($connexion1){
		// on créer la requête
		$requete = "CREATE TABLE IF NOT EXISTS ".DB_NAME.".".DB_TABLE." (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
																		first_name VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		last_name VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		email VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		gender VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
																		language_id INT NOT NULL) 
																		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
 
		// on prépare et on exécute la requête
		$connexion1->prepare($requete)->execute();
		$connexion1 = null;
		echo '<p>TABLE ' . DB_TABLE . ' CREEE !</p>'; 
	}
	//var_dump($users);
	


	foreach ($users as $key => $ligne) {
		
		$first_name =  ($users[$key] -> first_name);
		$last_name =  ($users[$key] -> last_name);
		$email =  ($users[$key] -> email);
		$gender =  ($users[$key] -> gender);
		$language_id =  1;

			//echo  $first_name . $last_name . $email . $gender ;

		$pdo1 = new PDO('mysql:host=localhost;dbname=' . DB_NAME .';charset=utf8', 'root', 'root');
		//ajout de la donnée
		$req = $pdo1 -> prepare('INSERT INTO '.  DB_TABLE .'(first_name,last_name,email,gender, language_id) VALUES(:first_name, :last_name, :email, :gender, :language_id)');

		$req -> execute(array(	'first_name' => $first_name,
									'last_name' => $last_name,
									'email' => $email,
									'gender' => $gender, 
									'language_id' => $language_id));	

	}
}


?>
