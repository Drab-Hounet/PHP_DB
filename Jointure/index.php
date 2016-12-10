<!-- This code is highly perfectible -->
<!-- If you want to change it : do it -->
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Manipulation DB MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
<head>

</head>
<body>
	<div class="col-md-offset-1">
		<h3> Ajouter le contenur JSON dans une DB My SQL </h3>
		<form class='form-horizontal' action="createDbAndTable.php" method="post">
			URL : <input type="text" name="url" value="https://morning-crag-57680.herokuapp.com" >
			<button id="sauvegarde">Sauvegarde</button>
		</form>	
	</div>


	<form class='form-horizontal' action="saveUser.php" method="post">
		<div class="col-md-offset-1">
			<h3>Ajouter un user dans la table user DB My SQL </h3>
		</div>
			<div class = "form-group">
				<div class = "col-md-12"> 
					<div class = "col-md-2  col-md-offset-1"> 
						<div class="col-md-10 col-md-offset-1">
							<label class = "col-md-3">FIRST_NAME</label>
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<label class = "col-md-3">LAST_NAME</label>
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<label class = "col-md-3">EMAIL</label>
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<label class = "col-md-3">GENDER</label>
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<label class = "col-md-3">ENREGISTREMENT</label>
						</div>
					</div>
				</div>
			</div>
			<div class = "form-group">
				<div class = "col-md-12"> 
					<div class = "col-md-2 col-md-offset-1"> 
						<div class="col-md-10 col-md-offset-1">
							<input type="text" name="first_name">
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<input type="text" name="last_name">
						</div>
					</div>
					<div class = "col-md-2">
						<div class="col-md-10 col-md-offset-1"> 
							<input type="text" name="email">
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-1">
							<select name="gender">
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
						</div>
					</div>
					<div class = "col-md-2"> 
						<div class="col-md-10 col-md-offset-2">
							<button name="save">SAVE</button>
						</div>
					</div>
				</div>
			</div>
	</form>
	




	<div class="col-md-10 col-md-offset-1">
		<?php
			if(isset($_GET['type'])){
				$type = $_GET['type'];
				$minPage = $_GET['page'];
   				include("affichejointure.php");
   			}else{
   				$type = 'none';
   				$minPage = 0;
   				include("affichejointure.php");
   			}

		?>
	</div>
</body>
</html>
