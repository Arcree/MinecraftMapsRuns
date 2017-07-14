<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('INSERT INTO submit (Player, Map, Time, Categorie, Lien, Date, Information) VALUES(?, ?, ?, ?, ?, ?, ?)');
	$req->execute(array($_POST['runnerName'], $_POST['mapName'], $_POST['time'], $_POST['category'], $_POST['link'], $_POST['date'], $_POST['informations']));
	
	header('Location: Submission.php');
	
?>