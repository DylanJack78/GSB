<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesSecteurs=Secteur::getAll();
					 include("vues/v_secteur.php");
					 break;
    case 'modifier' :
					include("vues/v_form_secteur.php");
					break;

	case 'ajouter' :
					include("vues/v_form_secteur.php");
					break;
    case 'supprimer' :
					$leSecteur=Secteur::supprimerSecteur($_REQUEST['numsec']);
					header("refresh: 0;url=index.php?uc=secteur&action=all");
					break;
    case 'VerifForm' :
                    if(!empty($_POST['idSecteur'])) // s'il s'agit d'une modification
					{
						$leSecteur=Secteur::modifierSecteur($_POST['idSecteur'],$_POST['nomSecteur']);
						header("refresh: 0;url=index.php?uc=secteur&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						$leSecteur=Secteur::ajouterSecteur($_POST['nomSecteur']);
						header("refresh: 0;url=index.php?uc=secteur&action=all");
					}
					break;
}
?>
