<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/loginCSS.css" media="all" />
		<meta charset="utf-8" />
		<title>PPE</title>
	</head>
	
	<body>
		<div class="box">
			<h1>CONNEXION</h1>
			<input type="text" name="username" id="username" placeholder="Identifiant">
			<input type="password" name="password" id="password" placeholder="Mot de passe">
			<button name="bouton" id="bouttonConnexion">Valider</button>
			<p class ="errorEmpty"> L'identifiant ou le mot de passe sont vides</p>
			<p class="errorGlobal"> Le mot de passe ne correspond pas à l'identifiant</p>
			<p class="banned"> Vous êtes banni du forum, vous ne pouvez plus vous connecter</p>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../JavaScript/portail.js"></script>
</html>