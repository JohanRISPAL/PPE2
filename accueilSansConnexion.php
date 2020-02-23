<?php
    include("php/fonction.php");
    session_destroy();

    $bdd = getConnexion();
 	$posts = getUserByPost();
	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="CSS/CSS_accueil.css" media="all" />
		<meta charset="utf-8" />
		<title>PPE 2</title>
	</head>
	<body>
		<div id="main">
			<div id="top">
				<div id="user">	
					<div id="in-user">
						<div id="img-user">
							<img src="images/image1.jpg"/>
						</div>
						<div id="avatar-side">
							<div id="avatar"> Avatar </div>
							
						</div>
					</div>
				</div>
				<div id="theme"><img src="images/logo3.png"/></div>
				<div id="boutons">
					<a href="php/portail.php"> CONNEXION </a>
					<a href="php/inscription.php"> INSCRIPTION </a>
				</div>	
			</div>
			<ul id="nav">
				<li><a href="#"> Champions </a></li>
				<li><a href="#"> Build </a></li>
				<li><a href="#"> Citations </a></li>
				<li><a href="#"> Histoire </a></li>
			</ul>
			
			<div id="welcome">
				
				<p> WELCOME TO THE LEAGUE OF DRAVEN ! <p> <br>
				<p> Pour plus de DRAVEN, veuillez vous connecter  <p>
				<p> où vous inscrire. <p>
			</div>
			
			
				
			
			
		</div>
	</body>
</html>
	