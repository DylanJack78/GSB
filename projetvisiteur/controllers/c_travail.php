<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesTravaux=Travail::getAll();
					 include("vues/v_travail.php");
					 break;
    case 'modifier' :
					include("vues/v_form_travail.php");
					break;

	case 'ajouter' :
					include("vues/v_form_travail.php");
					break;
    case 'supprimer' :
					$leTravail=Travail::supprimerTravail($_REQUEST['numtra']);
					header("refresh: 0;url=index.php?uc=travail&action=all");
					break;
    case 'VerifForm' :
                    if(!empty($_POST['idTravail'])) // s'il s'agit d'une modification
					{
						$leTravail=Travail::modifierTravail($_POST['idTravail'],$_POST['travail']);
						header("refresh: 0;url=index.php?uc=travail&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						$leTravail=Travail::ajouterTravail($_POST['travail']);
						header("refresh: 0;url=index.php?uc=travail&action=all");
					}
					break;
}
?>
