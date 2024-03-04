<div id="bloc-menu">
	<a href="accueil.php">Accueil</a>
	<br /><a href="mailto:commercial@lafleur.com">Nous écrire</a>
	<hr>
	<ul>
	<?php
		include_once('utils.php');
		$idConnexion=cnx();
		if ($idConnexion)
		{
			$requete='select * from categorie;';
			$jeuResultat=mysqli_query($idConnexion, $requete);
			$ligne=mysqli_fetch_assoc($jeuResultat);
			while ($ligne)
			{
				echo '<li><a href="listePdt.php?categ='.$ligne["cat_code"].'">'.$ligne["cat_libelle"]."</a></li>";
				$ligne=mysqli_fetch_assoc($jeuResultat);
			}
			mysqli_close($idConnexion);
		}
	?>
	</ul>
	<form action="panier.php" method="get">
		  <input type="submit" name="action" value="Vider le panier" />
	</form>
	<form action="commande.php" method="get">
		  <p><input type="submit" value="Commander" /> <!-- ajouter action ?-->
	</form>
</div>