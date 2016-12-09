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
	//echo '<body>';
	//definition constante
	define( 'DB_NAME', 'baseTest' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
	define( 'DB_TABLE', 'json' );

	try{
		$pdo = new PDO('mysql:host='.DB_HOST.";dbname=" .DB_NAME.";charset=utf8", DB_USER, 
			DB_PASSWORD);

		$requete = $pdo->query('SELECT COUNT(id) FROM json');
		$lancementLength = $requete->fetch();

		// var_dump($longueurDB) ;
		// echo $lancementLength['COUNT(id)']; 
		$lengthDB = $lancementLength['COUNT(id)'];

		
		if(isset($_GET['page']) && ($_GET['type'] == 'next') ){
			$longueur = 10;
			$min = $_GET['page'] + $longueur;
			// if (($min + 10) > $lengthDB && ($min) < $lengthDB){
			// 	$longueur = $lengthDB - $min ;
				
			// }elseif(($min) > $lengthDB){
			// 	$min = $_GET['page'];
			// 	$longueur = $lengthDB - $min;
			// }

			

		}elseif(isset($_GET['page']) && ($_GET['type'] == 'previous') ){
			$longueur = 10;
			$min = $_GET['page'] - $longueur;
			
		}else{
			$min = 0;
			$longueur = 10;
		}

		echo $min . ' ' . $longueur. ' ' . $lengthDB ;

		$reponse = $pdo->prepare('SELECT * FROM json LIMIT :min, :longueur');

		$reponse->bindParam(':min', $min, PDO::PARAM_INT);
	 	$reponse->bindParam(':longueur', $longueur, PDO::PARAM_INT);
	 	$reponse->execute();

	 	//entete du tableau
		echo '<table class="table"><thead><tr><th>id</th><th>first_name</th><th>last_name</th><th>email</th><th>gender</th></tr></thead><tboby>';

		while($data = $reponse -> fetch()){
			echo '<tr><td>' . $data['ID'] . '</td><td>' . $data['first_name'] . '</td><td>' . $data['last_name'] . '</td><td>' . $data['email'] . '</td><td>' . $data['gender'] . '</td></tr>';
			$dataID = $data['ID'] - $longueur ;		
		}

		echo $dataID;
		echo '</table>';		
		echo '<div class="col-md-2 col-md-offset-5">';
		echo '<a href="afficheList.php?page=' . ($dataID) . '&type=previous' .'" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-left"></span> </a>';
		echo '<a href="afficheList.php?page=' . ($dataID) . '&type=next' .'" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-right"></span> </a>';
		
	} catch (PDOException $e) {
    print "Erreur !: " . $e -> getMessage() . "<br/>";
    die();
	}
?>	
</div>


<div class="col-md-1 col-md-offset-4">
	<a href="index.php" class="btn btn-default">BACK</a>
</div>
</body>
</html>