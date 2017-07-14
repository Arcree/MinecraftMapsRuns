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
	<h1>ALPHABETICAL ORDER:</h1>
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$reponse = $bdd->query('SELECT * FROM speedrun ORDER BY Map');
			

		while ($donnees = $reponse->fetch())
		{
		?>
				
			<!-- La map de fou                (    Any%                            ) in 1:52:56                          by Jean                                       [Watch the run] (Lien de vidéo)                        (2017-07-12  )                                 -->
			<p id="<?php echo $donnees['Map']; ?>"><a href="MapInfo.php?Map=<?php echo $donnees['Map']; ?>" id="map">  <?php echo $donnees['Map']; ?>  </a> 
			(<span id="<?php echo $donnees['Categorie']; ?>"><?php echo $donnees['Categorie']; ?></span>) 
			in <?php echo $donnees['Temps']; ?> 
			by <a href="RunnerInfo.php?Runner=<?php echo $donnees['Player']; ?>" id="runner">  <?php echo $donnees['Player']; ?>  </a>  
			<a href="<?php echo $donnees['Lien']; ?>" id="link">[Watch the run]</a>  
			(<?php echo $donnees['Date']; ?>) </p>
			<?php	
		}	
			
		$reponse->closeCursor();
	?>
	
</body>
</html>