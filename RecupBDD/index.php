<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Manipulation des formulaires</title>

	<link href="css/normalize.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">


</head>

<body>
	<div class="contains-fluid">
		<div class ="rows">
			<div class = "col-md-12"> 
				<form name="formulaire_sauv" data-form ="form1" class="form-horizontal" action="postToBDD.php" method="post">
					<div class = "col-md-12"> 
						<div class="col-md-4 col-md-offset-4">
							<h1>Formulaire d'inscription1</h1>
						</div>
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
					<div class="col-md-2 col-md-offset-5" >
						<a href="afficheList.php" class="btn btn-info">AFFICHE</a>
					</div>
				
			</div>
		</div>
	</div>


	<script src="js/jquery.js"></script>
	<script src="js/controle.js"></script>


</body>

</html>