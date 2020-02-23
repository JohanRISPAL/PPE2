<?php
	include("fonction.php");
	$bdd = getConnexion();

	if(!empty($_POST["getTheme"]))
	{
		$id = $_POST['id'];
		$queryPost = $bdd->prepare("SELECT * FROM posts INNER JOIN theme ON posts.idTheme = theme.idTheme INNER JOIN users ON users.idUser = posts.idUser WHERE theme.idTheme = ?");
		$queryPost->execute([$id]);
		echo json_encode($queryPost->fetchAll());
	}
?>