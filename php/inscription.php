<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/inscriptionCSS.css" media="all" />
		<meta charset="utf-8" />
		<title>PPE 2</title>
	</head>
	<body>
		<form class="inscription" id="inscription" action="confirmationInscription.php" method="post">
			<h1>INSCRIPTION</h1>
			<input type="hidden" name="hidden" value="1">
			<input type="text" name="pseudo" id="pseudo" laceholder="pseudo">
			<input type="password" name="password" id="password" placeholder="Mot de passe">
			<input type="password" name="confirmPassword" id ="confirm" placeholder="confirmation mot de passe : ">
			<input type="button" name="boutonValidation" id="bouttonInscription" value="Valider">
			<p class ="errorEmpty"> L'identifiant ou le mot de passe et la confirmation sont vide</p>
			<p class="errorMdp"> Les mots de passes sont différents</p>
			<p class="existId">L'identifiant existe déja</p>
			
		</form>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../JavaScript/inscription.js"></script>
</html>