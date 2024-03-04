<?php
   session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Commande</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <link rel="Stylesheet" type="text/css" href="lafleur.css" />
</head>
<body>
	<?php include('entete.php');?>
	<div id="bloc-page">
		<?php include('menu.php');?>
		<div id="bloc-contenu">
			<h2>Récapitulatif des articles commandés</h2>
			<table class="tableau-fleurs">
			<tr>
				<th>Ref</th>
				<th>Désignation</th>
				<th>Prix unit.</th>
				<th>Qté</th>
				<th>Montant</th>
			</tr>
			<?php
				include_once('utils.php');
				$idConnexion=cnx();
				if ($idConnexion)
				{
					$total=0;
					for ($i=0;$i<count($_SESSION["reference"]);$i++)
					{
						$ref=$_SESSION["reference"][$i];
						$qte=$_SESSION["quantite"][$i];
						$requete="select pdt_designation,pdt_prix from produit where pdt_ref='".$ref."';";
						$produit=mysqli_query($idConnexion,$requete);
						$ligne=mysqli_fetch_assoc($produit);
						$des=$ligne["pdt_designation"];
						$prix=$ligne["pdt_prix"];
						$montant=$qte*$prix;
						$total=$total+$montant;
						echo '<tr>';
						echo '<td>'.$ref.'</td>';
						echo '<td>'.$des.'</td>';
						echo '<td class="prix">'.$prix.' €</td>';
						echo '<td>'.$qte.'</td>';
						echo '<td class="prix">'.$montant.' €</td>';
						echo '</tr>';
					}
					mysqli_close($idConnexion);
					echo '<tr>';
					echo '<td class="prix" colspan="4">Total</td>';
					echo '<td class="prix">'.$total.' €</td>';
					echo '</tr>';
				}
			?>
			</table>
			<form name="clientPasse" action="envoyer.php" method="get">
			Code client : <input type="text" size="10" name="codeClient" />
			&nbsp&nbsp&nbsp Mot de passe : <input type="password" size="10" name="motPasse" />
			<p><input type="submit" name="choix" value="envoyer la commande" />
			</form>
		</div>
    </div>
</body>
</html>