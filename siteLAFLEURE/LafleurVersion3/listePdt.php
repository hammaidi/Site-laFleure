<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>
		<?php 
			include_once('utils.php');
			echo getTitre($_GET["categ"]); 
		?>
	</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fr" />
    <link rel="Stylesheet" type="text/css" href="lafleur.css" />
</head>
<body>
	<?php include('entete.php');?>
	<div id="bloc-page">
		<?php include('menu.php');?>
		<div id="bloc-contenu">
			<?php
				include_once('utils.php');
				$idConnexion=cnx();
				if ($idConnexion)
				{
					echo '<h2>'.getTitre($_GET["categ"]).'</h2>';
					echo '<table class="tableau-fleurs">';
					$requete="select * from produit where pdt_categorie='".$_GET["categ"]."';";
					$jeuResultat=mysqli_query($idConnexion,$requete);
					$ligne=mysqli_fetch_assoc($jeuResultat);
					while($ligne)
					{
						echo '<tr>';
						echo '<td class="image"><img src="../images/'.$ligne["pdt_image"].'.jpg" alt="'.$ligne["pdt_designation"].'"/></td>';
						echo '<td class="reference">'.$ligne["pdt_ref"].'</td>';
						echo '<td class="description">'.$ligne["pdt_designation"].'</td>';
						echo '<td class="prix">'.$ligne["pdt_prix"].' €</td>';
						echo '</tr>';
						$ligne=mysqli_fetch_assoc($jeuResultat);
					}
					echo '</table>';
				}
				echo '<form action="panier.php" method="get">';
				echo '<select name="refPdt" size="1">';
				$jeuResultat=mysqli_query($idConnexion,$requete);
				$ligne=mysqli_fetch_assoc($jeuResultat);
				if($ligne)
				{
					echo '<option selected value="'.$ligne["pdt_ref"].'">'.$ligne["pdt_designation"].'</option>';
					$ligne=mysqli_fetch_assoc($jeuResultat);
					while($ligne)
					{
						echo '<option value="'.$ligne["pdt_ref"].'">'.$ligne["pdt_designation"].'</option>';
						$ligne=mysqli_fetch_assoc($jeuResultat);
					}
				}
				echo '</select>';
				echo 'Quantité : ';
				echo '<input type="text" name="quantite" size="5" value="1" />';
				echo '<br /><br /><input type="submit" name="action" value="Ajouter au panier" />';
				echo '</form>';
				mysqli_close($idConnexion);
			?>
		</div>
    </div>
</body>
</html>