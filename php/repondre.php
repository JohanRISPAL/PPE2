<?php
	include("fonction.php");

	$bdd=getConnexion();

	$post = getPostById($_GET["idPost"]);
    $posts = getUserByPost();


	$titre = $post["Titre"];
	$contenu = $post["Contenu"];
	$idTheme = $post["idTheme"];

	$conv = getReponse($_GET["idPost"]);


    if(!empty($_POST["reponse"])){
        echo $_POST["reponse"];
    }

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/repondreCSS.css" media="all" />
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
				<div id="themeImg"><img src="../images/logo3.png"/></div>
				<div id="boutons">
					<a href="../php/accueilConnecte.php"> ACCUEIL </a>
				</div>	
			</div>
			<div id="center">
				
					<div id="contenuTitre">
<<<<<<< HEAD
						<?= $titre;?> <br>
						<?= $contenu; ?>
=======
						<p>Titre : <?= $titre;?></p>
						<br>
						<p>Contenu : <?= $contenu; ?></p>
>>>>>>> 7c0bc6dfa4086b87ae436dc3c60222d316d8e846
					</div>
					<div id="basPost">
						<div id="pseudo">
							<p>ecrit par <a href="profilUtilisateur.php?user=<?= $posts[0]['login']; ?>"><?= $posts[0]['login']; ?></a> </p>
						</div>
						<div id="date">
							<p>le <?= $posts[0]['DatePublication']; ?></p>
						</div>
					</div>
				
				<div id="boutonReponse">
					<div id="reponse">
						<?php
						for ($i = 0; $i < sizeof($conv); $i++)
						{
							echo $conv[$i]["Contenu"];
						?>

						<?php
						?>
							<br>
						<?php
						}
						?>
					</div>
					<div id="boutonRep">
						<form method="post" id="repondre" action="repondre.php?idPost=<?php echo $_GET["idPost"]; ?>">
							<input type="hidden" id="idTheme" value="<?=$idTheme?>">
							<textarea name="reponse" class="reponse" id="<?php echo $_GET["idPost"]?>"></textarea>
							<input type="button" id="btnRepondre" name="repondre" value="Répondre">
						</form>
					</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../JavaScript/reponse.js"></script>
</html>