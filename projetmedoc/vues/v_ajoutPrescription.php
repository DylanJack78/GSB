<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="padding-left: 15px;margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<form name="formPRESCRIPTION" method="post" action="index.php?uc=prescriptions&action=ajout">
			<h1> Prescription </h1>
            <?php
                if(!empty($_GET['error']) && $_GET['error'] == true){
                    echo "<p style='color: red;'>Le médicament n'a pas de prescription</p>";
                }
            ?>
			<label class="titre">Médicament n°1 :</label>
			<select class="zone" name='medicament'>
			<?php
				for($i=0;$i<count($lesMedicaments);$i++){
					echo "<option value= ".$lesMedicaments[$i] -> getDepotLegal() .">". $lesMedicaments[$i]->getNomCom() ."</option>";
				}
			?>
			</select>
			<label class="titre">Médicament n°2 :</label>
			<select class="zone" name='medicament2'>
			<?php
				for($i=0;$i<count($lesMedicaments);$i++){
					echo "<option value= ".$lesMedicaments[$i] -> getDepotLegal() .">". $lesMedicaments[$i]->getNomCom() ."</option>";
				}
			?>
			</select>
			<input type="submit" class="zone" value="Envoyer">
			<!--<label class="titre">&nbsp;</label><input class="zone" type="button" value="<"></input><input class="zone" type="button" value=">"></input>
		--></form>
	</div>
</div>
</body>
</html>

