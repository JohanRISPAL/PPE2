<?php 

	include("fonction.php");
	$bdd = getConnexion();
//on récupere les logins de tous les utilisateurs
	$user = $bdd->query("SELECT login FROM users WHERE login = '" .$_POST["pseudo"]."'");
	$userDonne = $user->fetch();
	$login = $userDonne['login'];
	$errorMessages = array('identifiantMsg' => "L'identifiant est vide ou deja utilisé", 'motdepasseMsg' => 'Les mots de passes sont différents ou vides', 'champsVides' => "Les données sont vides");

//on regarde si tout est rentré
	if (isset($_POST["hidden"]))
	{
		if (isset($_POST["pseudo"]))
		{
			if (isset($_POST["password"]))
			{
				if (isset($_POST["confirmPassword"]))
				{
					//si l'id du nouveau n'existe pas
					if ($_POST["pseudo"] != $login)
					{
						//mais que les mots de passes sont différents
						if($_POST['password'] != $_POST['confirmPassword'])
						{
							echo $errorMessages["motdepasseMsg"];
						}
						else
						{
							//preparation inscription et insertion
							$inscription = $bdd->prepare("INSERT INTO users (login, password, isAdmin, avatar) VALUES (?, ?, ?, ?)");
							$inscription->execute([$_POST['pseudo'], $_POST['password'], 0, "rakan.jpg"]);
						
							$bravo = "<p id='reussite'>Bravo vous etes inscrit</p>";
						}
					}
				}
			}
		}
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="../CSS/confirmInscriptionCSS.css" media="all" />
		<meta charset="utf-8" />
		<title>PPE 2</title>
	</head>
	
	<body>
		<div id="main">
			<div id="top">
				<div id="user">
					<div id="in-user">
						<div id="img-user">
							<img src="../images/image1.jpg"/>
						</div>
						<div id="avatar-side">

							<div id="avatar"> avatar </div>

						</div>
					</div>
				</div>
				<div id="theme"><img src="../images/logo3.png"/></div>
				<div id="boutons">

                    <a href="../accueilSansConnexion.php"> ACCUEIL </a>

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
