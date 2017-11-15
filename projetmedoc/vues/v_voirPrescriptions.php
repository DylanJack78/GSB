<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="padding-left: 15px;margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<form name="formPRESCRIPTION" method="post"  action="index.php?uc=prescriptions&action=voirPrescription">
			<h1> Prescription </h1>
            <?php
                if(!empty($_GET['error']) && $_GET['error'] == true){
                    echo "<p style='color: red;'>Le médicament n'a pas de prescription</p>";
                }
            ?>
        <label class="titre">Médicament :</label>
        <select class="zone" name='medicament'>
        <?php
            for($i=0;$i<count($lesMedicaments);$i++){
                echo "<option value= ".$lesMedicaments[$i] -> getDepotLegal() .">". $lesMedicaments[$i]->getNomCom() ."</option>";
            }
        ?>
        <input type="submit" value="Afficher"/>
    </form>
</div>
</div>
