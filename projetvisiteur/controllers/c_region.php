<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesRegions=Region::getAll();
					 include("vues/v_region.php");
					 break;
    case 'modifier' :
					include("vues/v_form_region.php");
					break;

	case 'ajouter' :
					include("vues/v_form_region.php");
					break;
    case 'supprimer' :
					$laRegion=Region::supprimerRegion($_REQUEST['numreg']);
					header("refresh: 0;url=index.php?uc=region&action=all");
					break;
    case 'VerifForm' :
                    if(!empty($_POST['idRegion'])) // s'il s'agit d'une modification
					{
						$laRegion=Region::modifierRegion($_POST['idRegion'],$_POST['nomRegion']);
						header("refresh: 0;url=index.php?uc=region&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						$laRegion=Region::ajouterRegion($_POST['nomRegion']);
						header("refresh: 0;url=index.php?uc=region&action=all");
					}
					break;
}
?>
