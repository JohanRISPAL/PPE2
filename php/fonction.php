<?php
	session_start();

	if (isset($_POST["method"]))
	{
		if (!empty($_POST["method"]))
		{
			echo $_POST["method"]();
		}
	}

	function userExist ()
	{
		$bdd = getConnexion();
		$user = $bdd->query("SELECT * FROM users WHERE login = '" . $_POST["pseudo"]."'");
		$userDonne = $user->fetch();
		echo json_encode($userDonne);
	}

	function getUser()
	{
		$bdd = getConnexion();
		$recupInfo = $bdd->prepare("SELECT * FROM users WHERE login = ? AND password = ?");
		$recupInfo->execute(array($_POST["user"], $_POST["pass"]));

		$recupInfoData = $recupInfo->fetchAll();

		if ($recupInfo->rowCount() != 0 && $recupInfoData[0]["isBanned"] == 0)
		{
			$boolean = true;
			$_SESSION["user"] = $_POST["user"];
			$_SESSION["avatar"] = $recupInfoData[0]["avatar"];
			$_SESSION["isAdmin"] = $recupInfoData[0]["isAdmin"];
            $_SESSION["isBanned"] = $recupInfoData[0]["isBanned"];
            $_SESSION["id"] = $recupInfoData[0]["idUser"];
		}

		else 
		{
			$boolean = false;
		}
		

		echo json_encode($boolean);
	}

	function getTheme()
	{
		$bdd = getConnexion();

		$theme = $bdd->prepare("SELECT nomTheme FROM theme WHERE idTheme = ?");
		$theme->execute(array($_POST["theme"]));
		$themeDonne = $theme->fetch();
		return $themeDonne;
	}


	function getUserByPost()
	{
		$bdd = getConnexion();

		$post = $bdd->query("SELECT *, login FROM posts INNER JOIN users ON users.idUser = posts.idUser ORDER BY posts.DatePublication
			DESC");
		$postDonne = $post->fetchAll(PDO::FETCH_ASSOC);
			
		return $postDonne;
		
	}

	function getConnexion()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=ppe02;charset=utf8', 'root', 'root');

		return $bdd;
	}

    function getUserWrite($idUser = null)
    {
        $bdd = getConnexion();
        if($idUser == null) {
            $user = $bdd->query("SELECT iduser FROM Users INNER JOIN posts ON users.idUser = posts.idUser ;");
            $returnuser = $user->fetch();
        } else {
            $user = $bdd->query("SELECT iduser FROM Users INNER JOIN posts ON users.idUser = posts.idUser WHERE Users.iduser = $idUser ;");
            $returnuser = $user->fetch();
        }

        return $returnuser;
    }

    function getPostById($id)
    {
    	$bdd = getConnexion();

    	$query=$bdd->prepare("SELECT * FROM posts WHERE idPosts = ?");
    	$query->execute(array($id));
    	$reponse = $query->fetch();

    	return $reponse;
    }

    function insertResponse()
    {
    	$bdd = getConnexion();
    	try {
    		$insert=$bdd->prepare("INSERT INTO reponse (Contenu, idPosts, idTheme, isBanned, idUser) VALUES (?, ?, ?, 0, ?)");
    		$insert->execute(array($_POST["contenu"], $_POST["idPost"], $_POST["idTheme"], $_SESSION["id"]));
    	} catch (PDOException $error) {
    		die($error->getMessage());
    	}

    }

    function getPost()
	{
		$arrayPost = array();
		
		$bdd = getConnexion();

		if (!empty($bdd))
		{
			$post = 'SELECT * FROM post';
			$postDonne = $bdd->prepare($post);
			$postDonne->execute();
			
			$arrayPost = $postDonne->fetchAll(PDO::FETCH_ASSOC);
		}
		
		return $arrayPost;
	}

	function getReponse($idPost)
    {
        $bdd = getConnexion();

        $getreponse=$bdd->prepare("SELECT reponse.*,posts.titre, posts.contenu, users.login FROM reponse INNER JOIN posts ON posts.idPosts = reponse.idposts INNER JOIN users ON reponse.idUser = users.idUser WHERE posts.idPosts = ? ");
        $getreponse->execute(array($idPost));

        $post = $getreponse->fetchAll(PDO::FETCH_ASSOC);

        return $post;
    }

    function getProfil($pseudo)
    {
    	$bdd = getConnexion();

    	$user = $bdd->prepare("SELECT * FROM users WHERE login = ?");
    	$user->execute(array($pseudo));

    	$userDonne = $user->fetch();

    	return $userDonne;
    }
?>