<?php
	include("fonction.php");

    $bdd = getConnexion();
 	$posts = getUserByPost();

 	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/discussionCSS.css" media="all" />
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
							<div id="avatar"><?php echo $_SESSION["user"]; ?>  </div>
						</div>
					</div>
				</div>
				<div id="themeImg"><img src="../images/logo3.png"/></div>
				<div id="boutons">
                    <a href="AccueilConnecte.php"> ACCUEIL </a>
				</div>	
			</div>
			<div id="center">
				<div id="barre_filtre">

						<?php
						$nomTheme = $bdd->query("SELECT DISTINCT(nomTheme), idTheme FROM theme ORDER BY nomTheme");
						

						while ($nomThemeDonne = $nomTheme->fetch())
						{
							echo "<button class='buttonTheme filtre' id='btnTheme_" .$nomThemeDonne['idTheme'] ."' value='" .$nomThemeDonne["nomTheme"]."'>" .$nomThemeDonne["nomTheme"]. "</button>" ;
						}

						?>
					

				</div>
				<div id="discussions">
    		<?php
		        for($i = 0; $i < sizeof($posts); $i++)
		        {

		    ?>
		        <div id= "post<?php echo $i; ?>"> 
		            <div id="contenu">
						<div id="contenuTitre">
							<?= $posts[$i]["Titre"]; ?> <br>
							<?php echo  $posts[$i]["Contenu"];?>
						</div>
						<div id="boutonRep">
							<?php
							if (!empty($_SESSION["id"]))
							{
								?>
								<a href="repondre.php?idPost=<?php echo $posts[$i]['idPosts']?>">repondre</a>
								<?php
							}
							else
							{
								header("portail.php");
							}	
							?>
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
			
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../JavaScript/discussion.js"></script>
</html>