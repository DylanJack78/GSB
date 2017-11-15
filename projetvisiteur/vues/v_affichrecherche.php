<div style="float:left;width:80%;" name="droite">
<div style="margin : 10px 2px 2px 2px;clear:left;background-color:77AADD;color:white;padding-left: 15px;" name="bas">
<form name="formMEDICAMENT" method="post" action="index.php?uc=medicaments&action=recherche">
Ici c'est la page d'affichage des recherches<br></br>

<?php
$larecherche = $_POST['rechercheMedicament'];

echo $larecherche;

$db = mysql_connect('localhost','root');

mysql_select_db('casmedoc',$db);

$sql = "SELECT MED_NOMCOMMERCIAL FROM medicaments Where MED_NOMCOMMERCIAL like '" . $larecherche . "%'";
//$sql2 = "COUNT(*) FROM medicaments Where MED_NOMCOMMERCIAL like '" . $larecherche . "%'";
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
//$req2 = mysql_query($sql2) or die('Erreur SQL !<br>'.$sql2.'<br>'.mysql_error());


while($data = mysql_fetch_assoc($req))
    {
    echo '<b>'.$data['MED_NOMCOMMERCIAL'].'<br></br>';
    }

mysql_close();

//echo $sql2.' résultats trouvé(s).';


?></p>
</div>
</div>
