<!-- This code is highly perfectible -->
<!-- If you want to change it : do it -->
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
	<title>Manipulation</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="css/style.css" rel="stylesheet">
<head>

</head>
<body>
<h3> Ajouter un utilisateur </h3>
<form action="createDbAndTable.php" method="post" id="addUser">
  URL : <input type="text" name="url">
  <button id="sauvegarde">Sauvegarde</button>
</form>


<?php include("affichejointure.php"); ?>
<script src="https://code.jquery.com/jquery-3.1.0.min.js" ></script>

<!-- https://morning-crag-57680.herokuapp.com/ -->

</body>
</html>
