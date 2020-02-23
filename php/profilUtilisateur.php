<?php

    include("fonction.php");

    $bdd = getConnexion();
    $user = getProfil($_GET['user']);

    if($_SESSION["isAdmin"] == 1)
    {
        if (!empty($_POST["ban"])) {
            try {
                $bandef = $bdd->query("UPDATE users SET isBanned=true WHERE login = '" . $_GET['user'] . "'");
            } catch (PDOException $erreur) {
                die($erreur->getMessage());
            }
        }

        if (!empty($_POST["banTemp"])) {
            $makerValue = $_POST["ComboBox"];
            $banTemp = $bdd->query("UPDATE users SET isBanned=true WHERE login = '" . $_GET['user'] . "'");

            if ($makerValue == 0) {
                $bantamp = $bdd->query("UPDATE users SET dateBan=DATE_ADD(CURDATE(), INTERVAL 7 DAY) WHERE login = '" . $_GET['user'] . "'");
            }
            if ($makerValue == 1) {
                $bantamp = $bdd->query("UPDATE users SET dateBan=DATE_ADD(CURDATE(), INTERVAL 14 DAY) WHERE login = '" . $_GET['user'] . "'");
            }
            if ($makerValue == 2) {
                $bantamp = $bdd->query("UPDATE users SET dateBan=DATE_ADD(CURDATE(), INTERVAL 1 MONTH) WHERE login = '" . $_GET['user'] . "'");
            }
            if ($makerValue == 3) {
                $bantamp = $bdd->query("UPDATE users SET dateBan=DATE_ADD(CURDATE(), INTERVAL 3 MONTH) WHERE login = '" . $_GET['user'] . "'");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="stylesheet" type="text/css" href="../CSS/banAdminCSS.css" media="all" />
    <meta charset="utf-8" />
    <title>PPE 2</title>
</head>
    <body>
		<div id="main">
			<div id="top">
				<div id="user">
					<div id="in-user">
						<div id="img-user">
							<img src="../Avatars/<?php echo $_SESSION["avatar"]; ?>"/>
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
				<div id="avatar">
					<img src="<?php echo $user["avatar"]; ?>"/>
				</div>
				<div id="pseudo">
					<p>PSEUDO : <?php echo $user["login"]; ?></p>
				</div>
				<div id="description">
					<p>DESCRIPTION : <?php echo $user["description"]; ?> </p>
				</div>
				<?php  if($_SESSION["isAdmin"] == 1)
				{
					?>
				<div id="formulairePrincipal">
					<form method="post" id="ban" action="Profil_Admin.php?user=<?= $_GET['user']?>">
						<div class="boutonbandef" >
							<input name="ban" class=bouton id="bouttonBan" type="submit" value="Ban def"/>
						</div>
					</form>
					<form method="post" id="banTemp" action="Profil_Admin.php?user=<?= $_GET['user']?>">
						<div id="ban temp">
							<select name="ComboBox">
								<option value="0">1 semaine</option>
								<option value="1">2 semaines</option>
								<option value="2">1 mois</option>
								<option value="3">3 mois</option>
							</select>
							<input name="banTemp" type="submit" value="banTemp">
						</div>
					</form>
				</div>
			<?php
				}
			?>
			</div>
		</div>	
    </body>
</html>


