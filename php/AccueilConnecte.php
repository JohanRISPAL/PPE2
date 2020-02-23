<?php

    include("fonction.php");

    $bdd = getConnexion();
    $posts = getUserByPost();

    if (isset($_POST["deco"]))
    {
        session_destroy();
                        
        header('Location: ../accueilSansConnexion.php');
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/CSS_accueilConnecte.css" media="all" />
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
							<form method="post" id="modifierProfil" action="modifier profil.php">
								<input type="submit" name="modifierProfil" value="Modifier">
							</form>
						</div>
					</div>
				</div>
				<div id="theme"><img src="../images/logo3.png"/></div>
				<div id="boutons">
					<a href="AccueilConnecte.php"> ACCUEIL </a>
					<a href="creation.php">CREER DISCUSSION </a>
					<a href="discussion.php"> DISCUSSION </a>
					<a href="../accueilSansConnexion.php"> DECONNEXION </a>
				</div>
			</div>
			<ul id="nav">
				<li><a href="#"> Champions </a></li>
				<li><a href="#"> Build </a></li>
				<li><a href="#"> Citations </a></li>
				<li><a href="#"> Histoire </a></li>
			</ul>
			<div id="discussions">
					<?php
						for($i = 0; $i < 5; $i++)
						{

					?>
						<div id= "post<?php echo $i; ?>"> 
							<div id="contenu">
								<div id="contenuTitre">
									<?= $posts[$i]["Titre"]; ?> <br>
									<?php echo  $posts[$i]["Contenu"];?>
								</div>
								<div id="boutonRep">
									<a href="repondre.php?idPost=<?php echo $posts[$i]['idPosts']?>">repondre</a>
								</div>
							</div>
							<div id="basPost">
								<div id="pseudo">
									Ecrit par <a href="profilUtilisateur.php?user=<?php echo $posts[$i]['login']?>"><?php echo $posts[$i]["login"] ?></a>
								</div>
								<div id="date">
									le <?= $posts[$i]["DatePublication"]; ?>
								</div>
							</div>
							
						</div>
						<?php
						}
						?>
			</div>

		</div>
	</body>
</html>