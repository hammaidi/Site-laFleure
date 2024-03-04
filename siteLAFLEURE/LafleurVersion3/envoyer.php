<?php
   session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Confirmation de commande</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <link rel="Stylesheet" type="text/css" href="lafleur.css" />
</head>
<body>
	<?php include('entete.php');?>
	<div id="bloc-page">
		<?php include('menu.php');?>
		<div id="bloc-contenu">
			<hr />
			<?php
				if (($_GET["codeClient"]!="") && ($_GET["motPasse"]!=""))
				{
					include_once('utils.php');
					$idConnexion=cnx();
					if ($idConnexion)
					{
						$requete="select clt_motPasse from clientconnu where clt_code='".$_GET["codeClient"]."';";
						$client=mysqli_query($idConnexion,$requete);
						$valeurPasse=mysqli_fetch_assoc($client);
						if ($valeurPasse["clt_motPasse"]==$_GET["motPasse"])
						{
							$nbLignes=count($_SESSION["reference"]);
							if ($nbLignes>0)
							{
								$moment=time();
								$requete="insert into commande values ('".$moment."','".$_GET["codeClient"]."','".date("Y-m-d")."');";
								mysqli_query($idConnexion,$requete);
								for ($i=0;$i<$nbLignes;$i++)
								{
									$ref=$_SESSION["reference"][$i];
									$qte=$_SESSION["quantite"][$i];
									$requete="insert into contenir values ('".$moment."','".$_GET["codeClient"]."','".$ref."',".$qte.");";
									mysqli_query($idConnexion,$requete);
								}
								echo "Votre commande a bien été enregistrée sous la référence ".$_GET["codeClient"]."/".$moment.".";
								$_SESSION["reference"]=array();
								$_SESSION["quantite"]=array();
							}
							else
							{
								echo "Commande non enregistrée, aucun produit commandé<br>";
							}
						}					
						else
						{
							echo "Commande non enregistrée, authentification refusée<br>";
						}
						mysqli_close($idConnexion);
					}
					else
					{
						echo "Commande non enregistrée, authentification refusée<br>";
					}
				}
				else
				{
					echo "Commande non enregistrée, authentification refusée<br>";
				}
			?>
			<hr />
		</div>
	</div>
</body>
</html>
