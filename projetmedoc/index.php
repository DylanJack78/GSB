<?php
session_start();
require_once("models/medicaments.php");
require_once("models/familles.php");
require_once("models/prescription.php");
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
	case 'medicaments':
	{
		include("controllers/c_medicaments.php");
		break;
	}
	case 'prescriptions':
	{
		include("controllers/c_prescriptions.php");
		break;
	}
	case 'voirAlbums':
	{
		include("controleurs/c_voirAlbums.php");
		break;
	}
	case 'administrer':
	{
		include("controleurs/c_gestion.php");
		break;
	}
}
include("vues/v_pied.php") ;
?>
