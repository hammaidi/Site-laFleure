<?php
	session_start();
	if (!isset($_SESSION["reference"]))
	{
			$_SESSION["reference"]=array();
			$_SESSION["quantite"]=array();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>Société Lafleur</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <link rel="Stylesheet" type="text/css" href="lafleur.css" />
</head>
<body>
	<?php include('entete.php');?>
	<div id="bloc-page">
		<?php include('menu.php');?>
		<div id="bloc-contenu">
			<img src="../images/accueil.jpg" alt="Photo de fleurs" />
			<p>"Dites-le avec Lafleur..."</p>
			<p>Constituez votre panier en naviguant, puis cliquez sur "Commander"...</p>
			<p>Vous devez être recensé comme client pour pouvoir commander.
			<br />Envoyez un mail en laissant vos coordonnées pour être contacté par notre service commercial.</p>
		</div>
    </div>
</body>
</html>
