
<?php

$action = $_REQUEST['action'];
//echo "action:".$action;
switch($action)
{
    case 'affich':
    {
        $lesMedicaments=Medicament::getAll();
        /*$lesMedicaments = [];
        for($i = 0; $i < count($lesPresciptions); $i++){
            array_push($lesMedicaments, Medicament::getMedicament($lesPresciptions[$i]->getMed1()[0]));
            array_push($lesMedicaments, Medicament::getMedicament($lesPresciptions[$i]->getMed2()[0]));
        }*/
        include("/vues/v_voirPrescriptions.php");
        break;
    }
	case 'supprimer':
	{
		$laPrescription=Prescription::supprimerPrescription($_GET['medicament']);
		header('location: index.php?uc=medicaments&action=affich');
        break;
	}
    case 'voirPrescription':
    {
        $laPrescriptions = Prescription::getPrescription($_POST['medicament']);
        $lesPrescriptions = Prescription::getPrescriptions($_POST['medicament']);
        if(count($lesPrescriptions) < 1){
            header('location: index.php?uc=prescriptions&action=affich&error=true');
        }else{
            $lesMedicaments = array();
            foreach($lesPrescriptions as $prescription){
                $med2 = $prescription->getMed2();
                array_push($lesMedicaments, Medicament::getMedicament($med2));
            }
            $lesFamilles=Famille::getAll();
            include("/vues/v_voirPrescription.php");
        }
        break;
    }
    case 'ajoutForm':
    {
        $lesPrescriptions=Prescription::getAll();
        $lesMedicaments=Medicament::getAll();
        include("/vues/v_ajoutPrescription.php");
        break;
    }
    case 'ajout':
    {
        if($_POST['medicament2'] !== $_POST['medicament']){
            $lesPrescriptions=Prescription::ajouterPrescription($_POST['medicament'], $_POST['medicament2']);
            header('location: index.php?uc=prescriptions&action=affich');
        }
        else{
            header('location: index.php?uc=prescriptions&action=ajoutForm&error=true');
        }
        break;
    }
    default:
    {
        echo "rien";
        break;
    }
}
?>
