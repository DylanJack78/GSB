<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action'];
switch($action)
{
	case 'all': 	 $lesVisiteurs=Visiteur::getAll();
					 include("vues/v_visiteur.php");
					 break;
    case 'modifier' :
					include("vues/v_form_visiteur.php");
					break;

	case 'ajouter' :
					include("vues/v_form_visiteur.php");
					break;
    case 'supprimer' :
					$leVisiteur=Visiteur::supprimerVisiteur($_REQUEST['numvis']);
					header("refresh: 0;url=index.php?uc=visiteur&action=all");
					break;
    case 'VerifForm' :
                    if(!empty($_POST['idVisiteur'])) // s'il s'agit d'une modification
					{
						$leVisiteur=Visiteur::modifierArtiste($_POST['idVisiteur'],$_POST['nomVisiteur']);
						header("refresh: 0;url=index.php?uc=visiteur&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						$leVisiteur=Visiteur::ajouterVisiteur($_POST['nomVisiteur']);
						header("refresh: 0;url=index.php?uc=visiteur&action=all");
					}
					break;
}
?>
