<?php
   session_start();
?>
<html>
<body>
<?php
    switch($_GET["action"])
    {
        case "Vider le panier":
            $_SESSION["reference"]=array();
            $_SESSION["quantite"]=array();
            break;
        case "Ajouter au panier":
			$i=0;
			while (($i<count($_SESSION["reference"])) && ($_SESSION["reference"][$i]!=$_GET["refPdt"]))
			{
				$i++;
			}
			if ($i==count($_SESSION["reference"]))
			{
				$_SESSION["reference"][$i]=$_GET["refPdt"];
				$_SESSION["quantite"][$i]=$_GET["quantite"];
			}
			else
			{
				$_SESSION["quantite"][$i]+=$_GET["quantite"];
			}
            break;
    }
	header("Location: accueil.php");
?>
</body>
</html>