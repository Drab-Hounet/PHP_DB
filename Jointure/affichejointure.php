
<?php
	//echo '<body>';
	//definition constante
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

	//DETERMINATION DE LA LONGUEUR DE LA TABLE
	$requeteLongueur = $pdo->query('SELECT COUNT(id) FROM ' . DB_TABLE);
	$lancementLength = $requeteLongueur->fetch();
	$lengthDB = $lancementLength['COUNT(id)'];
	$requeteLongueur = null;


	$longueur = 11;

	//si appuie sur NEXT
	if ($type == 'next'){
		if($minPage + $longueur < $lengthDB){
			$min = $minPage + $longueur;
		}else{
			$min = 0;
		}

	//si appuie sur PREVIOUS
	}elseif ($type == 'previous'){
		if (($minPage) <= 0){
			$min = 0;
		}else{
			$min = $minPage - $longueur;
		}

	//chargement de la premiere page
	}else{
		$min = 0;
		
	}
		// $requete = $pdo->prepare('SELECT * FROM ' . DB_TABLE . ' ORDER BY ID DESC LIMIT :min, :longueur ');

		$requete = $pdo->prepare(	'SELECT * 
									FROM ' . DB_TABLE2 . '
									INNER JOIN '. DB_TABLE . ' 
									ON ' . DB_TABLE . '.language_id = ' . DB_TABLE2 . '.ID  
									ORDER BY ' . DB_TABLE . '.first_name LIMIT :min, :longueur ');

		// $requete = $pdo->prepare( 	'SELECT *
		// 							FROM language
		// 							INNER JOIN user 
		// 							ON user.language_id  = language.ID 
		// 							ORDER BY user.first_name DESC LIMIT :min, :longueur ');

		$requete->bindParam(':min', $min, PDO::PARAM_INT);
	 	$requete->bindParam(':longueur', $longueur, PDO::PARAM_INT);

	 	$requete->execute();

	 	//bouton next + previous
	 	$dataID = $min;

	 	echo '<div class="col-md-2 col-md-offset-5">';
		echo '<a href="index.php?page=' . ($dataID) . '&type=previous' .'" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-left"></span> </a>';
		echo '<a href="index.php?page=' . ($dataID) . '&type=next' .'" class="btn btn-lg btn-default"><span class="glyphicon glyphicon-chevron-right"></span> </a>';
		echo '</div>';

	 	//entete du tableau
		echo '<table class="table"><thead><tr><th>first_name</th><th>last_name</th><th>email</th><th>gender</th><th>language</th><th>Création language</th><th></th><th></th></tr></thead><tboby>';

		while($data = $requete -> fetch()){
			echo '<tr>	<td>' . $data['first_name'] . '</td>
						<td>' . $data['last_name'] . '</td>
						<td>' . $data['email'] . '</td>
						<td>' . $data['gender'] . '</td>
						<td>' . $data['name'] . '</td>
						<td>' . $data['creation_date'] . '</td>
						<td><a href="eraseUser.php?erase=' . $data['ID'] .'"'. 'class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a href="updateUser.php?update=' . $data['ID'] .'"'. 'class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span></a></td>
						</tr>';
		}
				
		echo '</tbody></table>';		
		
	
?>	
</div>


