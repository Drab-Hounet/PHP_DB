
<?php
	//echo '<body>';
	//definition constante
	define( 'DB_NAME', 'jointuresimple' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
	define( 'DB_TABLE', 'user' );
	define( 'DB_TABLE2', 'language' );

	try{
		$pdo = new PDO('mysql:host='.DB_HOST.";dbname=" .DB_NAME.";charset=utf8", DB_USER, 
			DB_PASSWORD);

		$requete = $pdo->query('SELECT COUNT(id) FROM' . DB_TABLE );
		// $lancementLength = $requete->fetch();

		// $lengthDB = $lancementLength['COUNT(id)'];



		$reponse = $pdo->prepare('SELECT * FROM ' . DB_TABLE);

	 	$reponse->execute();

	 	//entete du tableau
		echo '<table class="table"><thead><tr><th>id</th><th>first_name</th><th>last_name</th><th>email</th><th>gender</th><th>language_id</th></tr></thead><tboby>';

		while($data = $reponse -> fetch()){
			echo '<tr><td>' . $data['ID'] . '</td><td>' . $data['first_name'] . '</td><td>' . $data['last_name'] . '</td><td>' . $data['email'] . '</td><td>' . $data['gender'] . '</td><td>' . $data['language_id'] . '</td></tr>';
			
		}

		echo '</tbody></table>';		
		
	} catch (PDOException $e) {
    print "Erreur !: " . $e -> getMessage() . "<br/>";
    die();
	}
?>	
</div>


<div class="col-md-1 col-md-offset-4">
	<a href="index.php" class="btn btn-default">BACK</a>
</div>

