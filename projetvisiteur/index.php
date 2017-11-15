<?php
session_start();
require_once("models/visiteur.php");
require_once("models/departement.php");
require_once("models/region.php");
require_once("models/secteur.php");
require_once("models/travail.php");
require_once("models/pdo.php");
include("vues/v_menu.php") ; //traitement de la variable uc qui aiguilles vers un contr�leur secondaire ou la vue accueil

include("vues/v_entete.php") ; //et de l'en-tete et du menu(cf sch�ma ci-apr�s)

if(!isset($_REQUEST['uc']))
{
	$uc = 'accueil'; //on va afficher la vue accueil
}
else
{
	$uc = $_REQUEST['uc']; //sinon on r�cup�re le contr�leur ou il faut aller
}

switch($uc)
{
	case 'accueil':
	{
		include("vues/v_accueil.php");
		break;
	}
	case 'visiteur':
	{
		include("controllers/c_visiteur.php");
		break;
	}
	case 'departement':
	{
		include("controllers/c_departement.php");
		break;
	}
	case 'region':
	{
		include("controllers/c_region.php");
		break;
	}
    case 'secteur':
	{
		include("controllers/c_secteur.php");
		break;
	}
    case 'travail':
	{
		include("controllers/c_travail.php");
		break;
	}
	case 'administrer':
	{
		include("controllers/c_gestion.php");
		break;
	}
}
include("vues/v_pied.php") ;
?>
