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
	<h1>SUBMISSION:</h1>
	<form method="post" action="SubTreat.php">
		<p>
			<label for="runnerName">Name of the Runner</label> : <input type="text" name="runnerName" id="runnerName" list="runners" required /><br /><br />
			<label for="mapName">Name of the Map</label> : <input type="text" name="mapName" id="mapName" list="maps" required /><br /><br />
			<label for="time">Time to complete the game (Hour:Minute:Seconds / HH:MM:SS )</label> : <input type="text" name="time" id="time" required /><br /><br />
			<label for="category">Category (Any% , 100% , Glitchless...)</label> : <input type="text" name="category" id="category" list="category" required /><br /><br />
			<label for="link">Youtube Video Link (On this form: https://www.youtube.com/watch?v=YourVideoID)</label> : <input type="url" name="link" id="link" required /><br /><br />
			<label for="date">Date (YEAR-MONTH-DAY // YYYY-MM-DD)</label> : <input type="text" name="date" id="text" required /><br /><br />
			<label for="informations">Informations about this run</label> : <textarea name="informations" id="informations" required ></textarea><br /><br />
			
			<?php
			
			$runnerList = array();
			$mapList = array();
			$catList = array();
			
			try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=;charset=utf8', '', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}
				catch (Exception $e)
				{
					die('Erreur : ' . $e->getMessage());
				}
				
			$list = $bdd->query('SELECT Map, Player, Categorie FROM speedrun');
			

			while ($listdata = $list->fetch())
			{
				if (!in_array($listdata['Player'], $runnerList)) {
					$runnerList[] = $listdata['Player'];
				}
				if (!in_array($listdata['Map'], $mapList)) {
				$mapList[] = $listdata['Map'];
				}
				if (!in_array($listdata['Categorie'], $catList)) {
				$catList[] = $listdata['Categorie'];
				}
			}
			
			$list->closeCursor();
			
			// List for runnerName
			?><datalist id="runners"> <?php
			foreach ($runnerList as $runnerVal) {
				?><option><?php echo $runnerVal; ?></option><?php
			}
			?></datalist>
			<!-- List for mapName -->
			<datalist id="maps"> <?php
			foreach ($mapList as $mapVal) {
				?><option><?php echo $mapVal; ?></option><?php
			}
			?></datalist>
			
			<!-- List for category -->
			<datalist id="category"> <?php
			foreach ($catList as $catVal) {
				?><option><?php echo $catVal; ?></option><?php
			}
			?></datalist>
			
			
			<input type="submit" value="Submit" /><br /><br /><br />
		
		<h1>RUNS WAITING FOR VERIFICATION :</h1>
		
		<?php
		$submit = $bdd->query('SELECT * FROM submit ORDER BY Date');
			

		while ($donnees = $submit->fetch())
		{
		?>
				
			<!-- La map de fou                (    Any%                            ) in 1:52:56                          by Jean                                       [Watch the run] (Lien de vidéo)                        (2017-07-12  )                                 -->
			<p> <?php echo $donnees['Map']; ?> 
			(<?php echo $donnees['Categorie']; ?>) 
			in <?php echo $donnees['Time']; ?> 
			by <?php echo $donnees['Player']; ?> 
			<a href="<?php echo $donnees['Lien']; ?>" id="link">[Watch the run]</a>  
			(<?php echo $donnees['Date']; ?>) <br /><br /></p>
			<?php	
		}	
			
		$submit->closeCursor();
		?>
		</p>
	</form>
	
</body>
</html>