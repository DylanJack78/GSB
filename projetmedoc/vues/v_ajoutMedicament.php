<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="padding-left: 15px;margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<form name="formMEDICAMENT" method="post" action="index.php?uc=medicaments&action=ajout">
			<h1> Pharmacopee </h1>
			<label class="titre">NOM COMMERCIAL :</label><input type="text" size="25" name="MED_NOMCOMMERCIAL" class="zone" required />
			<label class="titre">FAMILLE :</label><select name="FAM_CODE" class="zone"required>
			<?php
				for($i=0;$i<count($lesFamilles);$i++){
					echo "<option value='" . $lesFamilles[$i]->getCode() . "'>" . $lesFamilles[$i]->getLibelle() . "</option>";
				}

			?>
			</select>
			<label class="titre">COMPOSITION :</label><textarea rows="5" cols="50" name="MED_COMPOSITION" class="zone" required></textarea>
			<label class="titre">EFFETS :</label><textarea rows="5" cols="50" name="MED_EFFETS" class="zone" required></textarea>
			<label class="titre">CONTRE INDIC. :</label><textarea rows="5" cols="50" name="MED_CONTREINDIC" class="zone" required></textarea>
			<label class="titre">PRIX ECHANTILLON :</label><input type="number"  min="0.01" step="0.01" max="2500" name="MED_PRIXECHANTILLON" class="zone" value="0.01" required />
			<input type="submit" class="zone" value="Envoyer">
			<!--<label class="titre">&nbsp;</label><input class="zone" type="button" value="<"></input><input class="zone" type="button" value=">"></input>
		--></form>
	</div>
</div>
</body>
</html>

