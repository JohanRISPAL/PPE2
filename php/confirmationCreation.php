<?php

	include("fonction.php");
	
	$bdd = getConnexion();
	$idUser = $_SESSION["id"];
	$theme = $_POST["theme"];

	//on regarde si tout est remplie
	if (isset($_POST["hidden"]))
	{
		if (isset($_POST["titre"]))
		{
			if (isset($_POST["post"]))
			{
				$message = $_POST["post"];
				$titre = $_POST["titre"];

				$creaMessage = $bdd->prepare("INSERT INTO posts (Contenu, DatePublication, isBanned, Titre, idUser, idTheme) VALUES (?, NOW(), ?, ?, ?, ?) ");
				$creaMessage->execute([$message, 0 , $titre, $idUser, $theme]);
				$bravo = "<p id='reussite'>Votre post a été créé</p>";
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/confirmCreationCSS.css" media="all" />
		<meta charset="utf-8" />
		<title>PPE 2</title>
	</head>
	
	<body>
		<div id="main">
			<div id="top">
				<div id="user">
					<div id="in-user">
						<div id="img-user">
							<img src="../Avatars/<?php echo $_SESSION["avatar"];?>"/>
						</div>
						<div id="avatar-side">

							<div id="avatar">
								<?php 
									echo $_SESSION["user"]; 
								?>
							</div>

						</div>
					</div>
				</div>
				<div id="theme"><img src="../images/logo3.png"/></div>
				<div id="boutons">

                    <a href="../php/accueilConnecte.php"> ACCUEIL </a>

				</div>	
			</div>
			<div id="center">
				<div id="text">
					<h1><?php echo $bravo?><h1>
				</div>
			</div>
		</div>
	</body>
</html>

 
