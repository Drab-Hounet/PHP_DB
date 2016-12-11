<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Manipulation DB MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<head>

</head>
<body>

<?php
	//determination des données users par rapport à l'id et mise en place dans les value des input
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

	$userID = $_GET['update'];
	$requete = $pdo->prepare(	'SELECT * 
								FROM ' . DB_TABLE . '
								WHERE ID=?');
	$requete -> execute(array($userID));
	
	while($data = $requete -> fetch()){
		$first_name = $data['first_name'];
		$last_name = $data['last_name'];
		$email = $data['email'];
	}
	echo '<form class="form-horizontal" action="saveUser.php?type=update&id=' . $userID . '" method="post">';

	echo '	<div class="col-md-offset-1">
				<h3>Mise à jour dans la table user DB My SQL </h3>';
	echo '	</div>
			<div class = "form-group">
				<div class = "col-md-12"> ';
	echo '			<div class = "col-md-2  col-md-offset-1">
						<div class="col-md-10 col-md-offset-1">';
	echo '					<label class = "col-md-3">FIRST_NAME</label>
						</div>
					</div>';
	echo '			<div class = "col-md-2">
						<div class="col-md-10 col-md-offset-1">';
	echo '					<label class = "col-md-3">LAST_NAME</label>
						</div>
					</div>';
	echo '			<div class = "col-md-2">
						<div class="col-md-10 col-md-offset-1">';
	echo '					<label class = "col-md-3">EMAIL</label>
						</div>
					</div>';
	echo '			<div class = "col-md-2">
						<div class="col-md-10 col-md-offset-1">';
	echo '					<label class = "col-md-3">GENDER</label>
						</div>
					</div>';
	echo '			<div class = "col-md-2">
						<div class="col-md-10 col-md-offset-1">';
	echo '					<label class = "col-md-3">ENREGISTREMENT</label>
						</div>
					</div>';
	echo '		</div>
			</div>';



	echo '<div class = "form-group"><div class = "col-md-12"><div class = "col-md-2 col-md-offset-1">';
	echo '<div class="col-md-10 col-md-offset-1">';

	echo '<input type="text" value = ' . $first_name . ' name="first_name">';
	echo '</div></div><div class = "col-md-2"><div class="col-md-10 col-md-offset-1">';
	
	echo '<input type="text" value =' .  $last_name  . ' name="last_name">';
	echo '</div></div><div class = "col-md-2"><div class="col-md-10 col-md-offset-1">';
	
	echo '<input type="text" value = ' . $email . ' name="email">';
	echo '</div></div><div class = "col-md-2"> <div class="col-md-10 col-md-offset-1">';
	
	echo '<select name="gender">';
	echo '<option value="Male">Male</option>';
	echo '<option value="Female">Female</option>';
	echo '</select></div></div>';
	echo '<div class = "col-md-2"><div class="col-md-10 col-md-offset-2">';
	echo '<button class="btn btn-success" name="update">Mise à jour</button>';
	echo '</div></div></div></div></form>';
	$requete = null;
?>


	<div class="col-md-1 col-md-offset-5">
		<a href="index.php" class="btn btn-default">BACK</a>
	</div>
</body>
</html>
