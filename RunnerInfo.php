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
	<?php $Runner = $_GET["Runner"]; ?>
	<h1><?php echo $Runner; ?></h1>
	<p>Speedruns by <?php echo $Runner; ?>: <br /></p>
	<?php
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
		catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			$reponse = $bdd->query('SELECT Map , Date FROM speedrun WHERE Player="'.$Runner.'" ORDER BY Date DESC');
			while ($donnees = $reponse->fetch())
			{
				?>
					<p><a href="MapInfo.php?Map=<?php echo $donnees['Map']; ?>"><?php echo $donnees["Map"]; ?></a> (<?php echo $donnees['Date']; ?>)</p>
				<?php
			}
		$reponse->closeCursor();
	?>
</body>
</html>