<div id="page">
	<div id="content">
		<div class="box">
            <?php if($_GET['action']=='findVisiteur')
            {?>
                <h2>Recherche Artiste</h2>
                <section>
                    <form action='index.php?uc=visiteur&action=verifRecher' method='post'>
                    <label for "nomVisiteur">Nom du Visiteur</label> <input type="text" name="nomVisiteur" id="nomVisiteur">
                    <input type="submit" value="Rechercher" />
                    </form>
                </section>
            <?php } ?>
            <?php
            if($_GET['action']=='all' || $_GET['action']=='verifRecher')
            {                                                                                ?>
			<h2>Liste des Visiteurs</h2>
			<section>

			<table><tr><th>Numéro</th><th>Nom</th><th>actions</th></tr>
			<script>
			function supprVisiteur(id) {
				if(confirm("Voulez vous vraimer supprimer ce visiteur. Attention la suppression du visiteur entrainera la suppression de tous ses travaux ?"))
				{
					location.href='index.php?uc=visiteur&action=supprimer&numvis='+id;
				}
				else {
					alert("le visiteur n'a pas été supprimé.");
				}
			}
			</script>
			<?php
			foreach($lesVisiteurs as $Visiteur) //parcours du tableau d'objets récupérés
			{ 	$idVis=$Visiteur->getId();
				$nom=$Visiteur ->getNom();?>
			<tr>
			<td width=5%><?php echo $idVis?></td><td width=80%><?php echo $nom?></a></td><!--affichage dans des liens-->
			<td class='action' width=15%>
					<a href='index.php?uc=visiteur&action=modifier&numvis=<?php echo $idArt ?>' class="imageModifier" title="modifier le visiteur"></a>
					<span class="imageSupprimer" onclick="javascript:supprVisiteur('<?php echo $idVis ;?>')" title="supprimer le visiteur" ></span>
			</td>

			</tr>
			<?php
			}
			?>
			</table>
			</section>
            <?php } ?>
		</div>
	</div>
	<br class="clearfix" />
</div>

