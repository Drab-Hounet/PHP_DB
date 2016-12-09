<?php
header('Access-Control-Allow-Origin: *');					//pour autoriser le site client à utiliser le flux html

$method = $_SERVER['REQUEST_METHOD'];						//request method -> envoie de la méthode de requete -> POST ou GET ou autres (head, put, delete, connect, ...)
//$input = file_get_contents('php://input');					//file_get_contents -> lire un flux  - php://input lit les données lors d'un post

define( 'DB_NAME', 'baseTest' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_TABLE', 'json' );

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

	// connexion à la bdd
	$connexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
 
	// on vérifie que la connexion est bonne
	if($connexion){
		// on créer la requête
		$requete = "CREATE TABLE IF NOT EXISTS ".DB_NAME.".".DB_TABLE." (ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
																		first_name VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		last_name VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		email VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
																		gender VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) 
																		ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
 
		// on prépare et on exécute la requête
		$connexion->prepare($requete)->execute();
	}
	

	foreach ($users as $key => $ligne) {
		foreach ($ligne as $key1 => $champ) {
			//print($key1);
			//print($champ);
			//echo '<p>' . $key1 . ' ' . $champ . '</p>';
			switch ($key1) {
				
				case 'first_name':
					$first_name = $champ;
					break;

				case 'last_name':
					$last_name = $champ;
					break;
				
				case 'email':
					$email = $champ;
					break;			

				default:
					$gender = $champ;
					break;
			}
		}
			echo  $first_name . $last_name . $email . $gender ;

			$pdo1 = new PDO('mysql:host=localhost;dbname=baseTest;charset=utf8', 'root', 'root');
			//ajout de la donnée
			$req = $pdo1 -> prepare('INSERT INTO json(first_name,last_name,email,gender) VALUES(:first_name, :last_name, :email, :gender)');

			$req -> execute(array(	'first_name' => $first_name,
									'last_name' => $last_name,
									'email' => $email,
									'gender' => $gender));		
	}
}


?>
