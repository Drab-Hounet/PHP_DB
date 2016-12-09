<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Manipulation des formulaires</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">

</head>
<body>

<?php
	
	//definition constante
	define( 'DB_NAME', 'baseTest' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
	define( 'DB_TABLE', 'json' );

	$input = file_get_contents('php://input');	
	
	$data = array();
	parse_str($input, $data);
	unset($data['save']);

	try {
		$pdo = new PDO('mysql:host='.DB_HOST.";dbname=" .DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD);
		$req = $pdo -> prepare('INSERT INTO json(first_name,last_name,email,gender) VALUES
			(:first_name, :last_name, :email, :gender)');
		$req -> execute(array(			'first_name' => $data['first_name'],
										'last_name' => $data['last_name'],
										'email' => $data['email'],
										'gender' => $data['gender']));	

		$req  = null; // ferme la connection
		echo "ECRITURE FAITE";

	} catch (PDOException $e) {
    print "Erreur !: " . $e -> getMessage() . "<br/>";
    die();
	}

?>
<div class="col-md-1 col-md-offset-4">
	<a href="index.php" class="btn btn-default">BACK</a>
</div>
</body>
</html>
