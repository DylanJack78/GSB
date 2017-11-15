<?php
class Visiteur{

	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM VISITEUR " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesVisiteurs=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Visiteur');
        return $lesVisiteurs;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function ajouterVisiteur($nom,$adr,$cp,$ville,$dateEmb)
    {
		$sql="insert into visiteur values('', :nom, :adr, :cp, :ville, :date)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':adr', $adr);
        $resultat->bindParam(':cp', $cp);
        $resultat->bindParam(':ville', $ville);
        $resultat->bindParam(':date', $dateEmb);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }

	//supprime un artiste dont on passe l'id en paramètre
    public static function supprimerVisiteur($id)
    {
		// a completer
        $sql="delete from visiteur where VIS_MATRICULE= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function findById($id)
    {
        $sql="SELECT * FROM visiteur where VIS_MATRICULE= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leVisiteur=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Visiteur"); // lit la ligne et renvoie un objet Artist
        return $leVisiteur[0];
		// ajouter la gestion des exceptions
    }

	// modifie un objet Artiste
    public static function modifierVisiteur($id,$nom,$adr,$cp,$ville,$dateEmb)
    {
		// a completer
        $sql="update visiteur set VIS_NOM = :nom, VIS_ADRESSE = :adr, VIS_CP = :cp, VIS_VILLE = :ville, VIS_DATEEMBAUCHE = :date where VIS_MATRICULE = :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':adr', $adr);
        $resultat->bindParam(':cp', $cp);
        $resultat->bindParam(':ville', $ville);
        $resultat->bindParam(':date', $dateEmb);
        $resultat->bindParam(':id', $id);
        $resultat->execute(); // applique le paramètre
    }

	/**
     * renvoie la liste des albums d'un artiste
     * @return array<Album> tableau d'instances de Album
    */
    /*public function getAlbums()
    {
        $sql="SELECT * FROM album where alb_art= ". $this->getId();
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album');
        return $lesAlbums;
    }*/
    public static function RechercheVisiteur($char)
    {
        $sql = "SELECT * FROM VISITEUR WHERE VIS_NOM like '%".$char."%'";
        $monPdo = MonPdo::getInstance();
        $result = $monPdo->prepare($sql);
        $result->execute();
        $lesVisiteurs=$result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Visiteur");
        return $lesVisiteurs;
        $monPdo == null;
    }
}
