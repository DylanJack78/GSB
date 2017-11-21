<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesDepartements=Departement::getAll();
					 include("vues/v_departement.php");
					 break;
    case 'modifier' :
					include("vues/v_form_departement.php");
					break;

	case 'ajouter' :
					include("vues/v_form_departement.php");
					break;
    case 'supprimer' :
					$leDepartement=Departement::supprimerDepartement($_REQUEST['numdep']);
					header("refresh: 0;url=index.php?uc=departement&action=all");
					break;
    case 'VerifForm' :
                    if(!empty($_POST['idDepartement'])) // s'il s'agit d'une modification
					{
						$leDepartement=Departement::modifierDepartement($_POST['idDepartement'],$_POST['nomDepartement']);
						header("refresh: 0;url=index.php?uc=departement&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						$leDepartement=Departement::ajouterDepartement($_POST['nomDepartement']);
						header("refresh: 0;url=index.php?uc=departement&action=all");
					}
					break;
}
?>
