
<?php

	define( 'DB_NAME', 'jointuresimple' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );
	define( 'DB_TABLE', 'user' );
	define( 'DB_TABLE2', 'language' );

	$input = file_get_contents('php://input');	
	$data = array();
	parse_str($input, $data);
	unset($data['save']);

	var_dump($data['first_name']); 

	try{
		$connexion = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD);
	} catch (PDOException $e) {
		header("location: index.php?copySuccess=false");
    	die();
	}

	$language_id =  rand(1,4);
	$req = $connexion -> prepare('INSERT INTO '. DB_TABLE . '(first_name,last_name,email,gender,language_id) VALUES(:first_name, :last_name, :email, :gender, :language_id)');
	$req -> execute(array(	'first_name' => $data['first_name'],
							'last_name' => $data['last_name'],
							'email' => $data['email'],
							'gender' => $data['gender'], 
							'language_id' => $language_id));	

	$req  = null; // ferme la connection

	header("location: index.php?copySuccess=true");

?>