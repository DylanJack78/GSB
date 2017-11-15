
<?php

$action = $_REQUEST['action'];
//echo "action:".$action;
switch($action)
{
    case 'affich':
    {
        $lesMedicaments=Medicament::getAll();
        $lesFamilles=Famille::getAll();
        include("/vues/v_voirMedicaments.php");
        break;
    }
	case 'recherche':
	{
		include("/vues/v_rechercheMedicaments.php");
		break;
	}
	case 'affichrecherche':
	{
		$larecherche=Medicament::rechercheMedicament($larecherche);
		include("/vues/v_affichrecherche.php");
		break;
	}
    case 'ajoutForm':
    {
        $lesMedicaments=Medicament::getAll();
        $lesFamilles=Famille::getAll();
        include("/vues/v_ajoutMedicament.php");
        break;
    }
    case 'ajout':
    {
        $lesMedicaments=Medicament::ajouterMedicament($_POST['FAM_CODE'], $_POST['MED_NOMCOMMERCIAL'], $_POST['MED_COMPOSITION'], $_POST['MED_EFFETS'], $_POST['MED_CONTREINDIC'], $_POST['MED_PRIXECHANTILLON']);
        header('location: index.php?uc=medicaments&action=affich');
        break;

    }
	case 'supprimer':
	{
		$lesMedicaments=Medicament::supprimerMedicament($_GET['medicament']);
		header('location: index.php?uc=medicaments&action=affich');
        break;
	}
    default:
    {
        echo "rien";
        break;
    }
}
?>
