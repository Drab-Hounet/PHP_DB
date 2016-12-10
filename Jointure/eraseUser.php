
<?php

	define( 'DB_NAME', 'jointuresimple' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', '' );
	define( 'DB_HOST', 'localhost' );
	define( 'DB_TABLE', 'user' );
	define( 'DB_TABLE2', 'language' );

	try{
		$pdo = new PDO('mysql:host='.DB_HOST.";dbname=" .DB_NAME.";charset=utf8", DB_USER, 
			DB_PASSWORD);
	} catch (PDOException $e) {
    print "Erreur !: " . $e -> getMessage() . "<br/>";
    die();
	}

	$userID = $_GET['erase'];

	$requete = $pdo->prepare('DELETE FROM ' . DB_TABLE . ' WHERE id = :userID');

	$requete->bindParam(':userID', $userID, PDO::PARAM_INT);
	$requete->execute();

	header("location: index.php");
?>