<?php
$action = $_REQUEST['action']; //récupération de l'action
//echo "action:".$action;
switch($action)
{
    case 'connexion':
                    include('vues/v_connexion.php');
                    break;
    case 'verifConnexion':
                    $laConn=Administrer::RechercheConnexion($_POST['login'],$_POST['mdp']);
                    header("refresh: 0;url=index.php");
                    break;
	default:echo "rien";
	}
	?>
