<?php
    include("fonction.php");

    $bdd = getConnexion();

    if(!empty($_POST["modifierMDP"]) || !empty($_POST["confirmMDP"])) {
        if ($_POST['modifierMDP'] != $_POST['confirmMDP']) {
            echo "<p id='echec'>Les mots de passes sont différents</p>";
        }
        else
        {
            $modifpwd = $bdd->prepare("UPDATE users SET password=? WHERE login = '" .$_SESSION["user"]."';");
            $modifpwd->execute((array($_POST["confirmMDP"])));
        }
    }

    if(!empty($_POST["modifierAvatar"])) {
        $_SESSION["avatar"] = $_POST["modifierAvatar"];

        $modifavatar = $bdd->prepare("UPDATE users SET avatar=? WHERE login = '" .$_SESSION["user"]."';");
        $modifavatar->execute((array("../Avatars/" .$_POST["modifierAvatar"])));
    }

    if(!empty($_POST["description"]))
    {
        $modidDescription = $bdd->prepare("UPDATE users SET description=? WHERE login = '" .$_SESSION["user"]."';");
        $modidDescription->execute(array($_POST["description"]));
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<link rel="shortcut icon" type="image/jpg" href="../images/viktor hide.jpg"/>
    <link rel="stylesheet" type="text/css" href="../CSS/CSS_modifierProfil.css" media="all" />
		<meta charset="utf-8" />
    <title>PPE 2</title>
</head>
    <body>
		<div id="main">
			<div id="top">
				<div id="user">
					<div id="in-user">
						<div id="img-user">
							<img src="../Avatars/<?php echo $_SESSION["avatar"];?>?>"/>
						</div>
						<div id="avatar-side">

							<div id="avatar"> <?php echo $_SESSION["user"]; ?> </div>

						</div>
					</div>
				</div>
				<div id="theme"><img src="../images/logo3.png"/></div>
				<div id="boutons">

                    <a href="AccueilConnecte.php"> ACCUEIL </a>

				</div>	
			</div>
			<div id="center">
				<div id="avatar-center">
					<img src="../Avatars/<?php echo $_SESSION["avatar"];?>"/>
				</div>
                <form method="post" id="modificationsglobale" action="modifier%20profil.php">
                    <div id="boutonsModifs">
                        <div id="bouton1">
                            <input type="file" name="modifierAvatar" id="modifierPseudo">

                        </div>
                        <div id="bouton2">
                            <input type="text" name="modifierMDP" id="modifierMDP" placeholder="Modifier le mot de passe">
                        </div>
                        <div id="bouton3">
                            <input type="text" name="confirmMDP" id="confirmMDP" placeholder="Confirmer le mot de passe">
                        </div>
                    <div id="description">
                        <p> Description : </p>
                        <input type="text" name="description">
                    </div>
                    <div id="boutonValider">
                        <button name="bouton" id="bouttonModifProfil">Valider</button>
                    </div>
                </form>
					
			</div>
		</div>
    </body>
</html>