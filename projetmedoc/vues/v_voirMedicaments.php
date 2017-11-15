<div style="float:left;width:80%;" name="droite">
<div style="margin : 10px 2px 2px 2px;clear:left;background-color:77AADD;color:white;padding-left: 15px;" name="bas">
<form name="formMEDICAMENT" method="post" action="index.php?uc=medicaments&action=supprimer">
<?php
$nomFamille = "";
for($i=0;$i<count($lesMedicaments);$i++){

	for($j = 0; $j<count($lesFamilles); $j++){
		if($lesMedicaments[$i]->getFamCode() == $lesFamilles[$j]->getCode()){
			$nomFamille = $lesFamilles[$j]->getLibelle();
		}
	}
	echo "<p style='padding-top: 15px;'>Nom commercial: " . $lesMedicaments[$i]->getNomCom() . "</p>".
	"<p>Famille: " . $nomFamille . "</p>".
	"<p>Effets: " . $lesMedicaments[$i]->getEffets() . "</p>".
	"<p>Composition: " . $lesMedicaments[$i]->getComposition() . "</p>".
	"<p>Prix Échantillon: " . $lesMedicaments[$i]->getPrixEchantillon() ."</p>";
	echo "<a href='index.php?uc=medicaments&action=supprimer&medicament=" . $lesMedicaments[$i]->getDepotLegal() ."' />Supprimer</a><br/><hr>";
}
?>
</div>
</div>
