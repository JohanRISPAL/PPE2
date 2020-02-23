<?php
	include("fonction.php");
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="shortcut icon" type="image/jpg" href="../images/viktor hide.jpg"/>
		<link rel="stylesheet" type="text/css" href="../CSS/creationCSS.css" media="all" />
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
							<div id="avatar"> <?php echo $_SESSION["user"]; ?> </div>
							
						</div>
					</div>
				</div>
				<div id="themeImg"><img src="../images/logo3.png"/></div>
				<div id="boutons">

                    <a href="AccueilConnecte.php"> ACCUEIL </a>

				</div>	
			</div>
			<div id="center">
				<div id="themePost">
					<form method="post" id="creation" action="confirmationCreation.php">
						<input type="hidden" name="hidden" value="1">
						<select name='theme' id='theme'>
						<option value="" disabled selected>Selectionne un theme</option>
		<?php
					$bdd = getConnexion();
					$theme = $bdd->query("SELECT nomTheme, idTheme FROM theme  ORDER BY nomTheme");
					$themeArray = array();
					$themeArray = $theme->fetchAll();

					foreach ($themeArray as $line) 
					{
						echo "<option value = '" .$line["idTheme"]."'>".$line["nomTheme"]."</option>";
					}
		?>
						</select>
						<input type="textarea" name="titre" id="titre" placeholder="titre du post">
						<input type="textarea" name="post" id="post" placeholder="contenu du post">
						<input type="button" id="envoie" value="envoyer">
						<p class ="errorEmptyTitle"> Il n'y a pas de titre</p>
						<p class="errorEmptyPost"> Il n'y a pas de message</p>
						<p class="errorEmpty">Le titre et le message sont vides</p>
					</form>
					</div>
				

		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="../JavaScript/creation.js"></script>
</html>