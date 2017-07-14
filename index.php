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
	<div id="gauche_main">
		<h1>LAST RUNS ADDED:</h1>
		<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$reponse = $bdd->query('SELECT * FROM speedrun ORDER BY Date DESC LIMIT 0,5');
			

			while ($donnees = $reponse->fetch())
			{
			?>
				
				<!-- La map de fou                (    Any%                            ) in 1:52:56                          by Jean                                       [Watch the run] (Lien de vidéo)                        (2017-07-12  )                                 -->
				<p id="<?php echo $donnees['Map']; ?>"><a href="MapInfo.php?Map=<?php echo $donnees['Map']; ?>" id="map">  <?php echo $donnees['Map']; ?>  </a> 
				(<?php echo $donnees['Categorie']; ?>) 
				in <?php echo $donnees['Temps']; ?> 
				by <a href="RunnerInfo.php?Runner=<?php echo $donnees['Player']; ?>" id="runner">  <?php echo $donnees['Player']; ?>  </a>  
				<a href="<?php echo $donnees['Lien']; ?>" id="link">[Watch the run]</a>  
				(<?php echo $donnees['Date']; ?>) </p>
				<?php	
			}	
			
			$reponse->closeCursor();
		?>
	</div>
	<div id="droite_main">
		<h1>NEWS:</h1>
	</div>
	
	<?php
	session_start();
	if(file_exists('compteur_visites.txt'))
	{
        $compteur_f = fopen('compteur_visites.txt', 'r+');
        $compte = fgets($compteur_f);
	}
	else
	{
        $compteur_f = fopen('compteur_visites.txt', 'a+');
        $compte = 0;
	}
	if(!isset($_SESSION['compteur_de_visite']))
	{
        $_SESSION['compteur_de_visite'] = 'visite';
        $compte++;
        fseek($compteur_f, 0);
        fputs($compteur_f, $compte);
	}
	fclose($compteur_f);


//Hackeurs:
//
//	'9RLLLCRC0', //NAMIKAZE

?>
	
</body>
</html>