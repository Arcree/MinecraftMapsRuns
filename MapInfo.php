<!DOCTYPE html>
<html>
<head>
	<!-- <link rel="icon" type="image/png" href="hdv3.png" />  -->
    <meta charset="utf-8" />
	<!--[if lt IE 9]>
	<script src="http://github.com/aFarkas/html5shiv/blob/master/dist/html5shiv.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="mmr.css" />
    <title>Minecraft Maps Speedruns !</title>
	
</head>

<body>
<header>
	<?php include 'tete.php'; ?>

</header>
	<?php $Map = $_GET["Map"]; ?>
	<h1><?php echo $Map; ?></h1>
	<?php
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
		catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$reponse = $bdd->query('SELECT * FROM speedrun WHERE Map="'.$Map.'"');
			while ($donnees = $reponse->fetch())
			{
				$yt_id = substr($donnees["Lien"], -11);
				?><p>Category: <?php echo $donnees["Categorie"]; ?><br />
				     Player: <a href="RunnerInfo.php?Runner=<?php echo $donnees['Player']; ?>">  <?php echo $donnees["Player"]; ?><br /></a>
					 Time: <?php echo $donnees["Temps"]; ?><br /><br />
					 Video Link: </p>
					 <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $yt_id; ?>" frameborder="0" allowfullscreen></iframe>
				  <p>Author's Comments: <?php echo $donnees["Informations"]; ?><br />
				  <?php echo $donnees["Date"]; ?><br /><br /></p>
				<?php
			}
		$reponse->closeCursor();
	?>
</body>
</html>