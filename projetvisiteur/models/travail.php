<?php
class Travail{

    private $idReg;
    private $idVis;
    private $dateTra;
    private $traRole;

    public function getIdReg()
    {
        return $this->idReg;
    }
    public function setIdReg($value)
    {
        $this->idReg=$value;
    }
    public function getIdVis()
    {
        return $this->idVis;
    }
    public function setIdVis($value)
    {
        $this->idVis=$value;
    }
    public function getDateTra()
    {
        return $this->dateTra;
    }
    public function setDateTra($value)
    {
        $this->dateTra=$value;
    }
    public function getTraRole()
    {
        return $this->traRole;
    }
    public function setTraRole($value)
    {
        $this->traRole=$value;
    }
	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM TRAVAILLER " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesTravaux=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Travail');
        return $lesTravaux;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    /*public static function ajouterSecteur($lib)
    {
		$sql="insert into secteur values('', :lib)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':lib', $lib);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }*/

	//supprime un artiste dont on passe l'id en paramètre
    /*public static function supprimerSecteur($id)
    {
		// a completer
        $sql="delete from secteur where SEC_CODE= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }*/
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    /*public static function findById($id)
    {
        $sql="SELECT * FROM secteur where SEC_CODE= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leSecteur=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Secteur"); // lit la ligne et renvoie un objet Artist
        return $leSecteur[0];
		// ajouter la gestion des exceptions
    }*/

	// modifie un objet Artiste
    /*public static function modifierSecteur($id,$lib)
    {
		// a completer
        $sql="update secteur set SEC_LIBELLE = :lib where SEC_CODE = :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->bindParam(':lib', $lib);
        $resultat->execute(); // applique le paramètre
    }*/

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
    /*public static function RechercheSecteur($char)
    {
        $sql = "SELECT * FROM SECTEUR WHERE SEC_LIBELLE like '%".$char."%'";
        $monPdo = MonPdo::getInstance();
        $result = $monPdo->prepare($sql);
        $result->execute();
        $lesSecteurs=$result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Secteur");
        return $lesSecteurs;
        $monPdo == null;
    }*/
}
