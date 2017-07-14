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
		$runners = array();
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		$reponse = $bdd->query('SELECT Player FROM speedrun ORDER BY Player');
			

		while ($donnees = $reponse->fetch())
		{
			if (!in_array($donnees['Player'], $runners)) {
				$runners[] = $donnees['Player'];
			}
		}	
		$reponse->closeCursor();
		
		foreach ($runners as $val) {
			?><p><a href="RunnerInfo.php?Runner=<?php echo $val; ?>"><?php echo $val; ?></a></p><?php
		}
	?>
	
</body>
</html>