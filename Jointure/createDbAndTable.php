<!DOCTYPE html>
<html>
<meta charset="UTF-8">
	<title>Manipulation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
<head>

<?php

define( 'DB_NAME', 'jointureSimple' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );
define( 'DB_HOST', 'localhost' );
define( 'DB_TABLE', 'user' );
define( 'DB_TABLE2', 'language' );

//echo isset($_POST['url']);

if(isset($_POST['url']) && !empty($_POST['url']) ){
	$users = json_decode(file_get_contents($_POST['url']));
	
	// CREATION DE LA DATABASE
	try{
		// connexion à Mysql sans base de données
		$pdo = new PDO('mysql:host='.DB_HOST, DB_USER, DB_PASSWORD);
	
	} catch (PDOException $e) {
		print "Erreur !: " . $e -> getMessage() . "<br/>";
    	die();
	}	
		// création de la requête sql
		// on teste avant si elle existe ou non (par sécurité)
		$requete = "CREATE DATABASE IF NOT EXISTS ".DB_NAME." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
		
		// on prépare et on exécute la requête
		$pdo->prepare($requete)->execute();
		$pdo = null;
	



	echo '<p>DATABASE ' . DB_NAME . ' CREEE !</p>'; 

	// CREATION DE LA TABLE
	try{
		$connexion1 = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {
		print "Erreur !: " . $e -> getMessage() . "<br/>";
    	die();
	}

	// CREATION DE LA TABLE2
	try{
		$connexion2 = new PDO("mysql:host=".DB_HOST.";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {
		print "Erreur !: " . $e -> getMessage() . "<br/>";
    	die();
	}	
 	
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
	

	//COPIE DU FICHIER JSON DANS LA DB - TABLE CREEE
	foreach ($users as $key => $ligne) {
		
		$first_name =  ($users[$key] -> first_name);
		$last_name =  ($users[$key] -> last_name);
		$email =  ($users[$key] -> email);
		$gender =  ($users[$key] -> gender);
		$language_id =  rand(1,4);

			//echo  $first_name . $last_name . $email . $gender ;

		try{
			$pdo1 = new PDO('mysql:host=localhost;dbname=' . DB_NAME .';charset=utf8', DB_USER, DB_PASSWORD);
		} catch (PDOException $e) {
		print "Erreur !: " . $e -> getMessage() . "<br/>";
    	die();
		}	
		
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
<body>
<div class="col-md-1 col-md-offset-4">
	<a href="index.php" class="btn btn-default">BACK</a>
</div>







</body>
</head>
</html>

