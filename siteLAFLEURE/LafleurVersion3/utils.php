<?php
function cnx()
{
    $idConnexion=mysqli_connect("localhost","root","","lafleur2");
    if ($idConnexion)
    {
		mysqli_set_charset($idConnexion, "utf8");
	}
	else
	{
		echo "Connexion à la base de données impossible !";
	}
    return $idConnexion;
}
function getTitre($idCateg)
{
	$idConnexion=cnx();
	$requete="select cat_libelle from categorie where cat_code='".$idCateg."';";
	$jeuResultat=mysqli_query($idConnexion, $requete);
	$ligne=mysqli_fetch_assoc($jeuResultat);
	return "Catalogue - ".$ligne["cat_libelle"];
}
?>