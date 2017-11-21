<?php
class Region{

    private $id;
    private $nom;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id=$value;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($value)
    {
        $this->nom=$value;
    }
	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM REGION " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesRegions=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Region');
        return $lesRegions;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function ajouterRegion($nom)
    {
		$sql="insert into region values('', :nom)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }

	//supprime un artiste dont on passe l'id en paramètre
    public static function supprimerRegion($id)
    {
		// a completer
        $sql="delete from region where REG_CODE= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function findById($id)
    {
        $sql="SELECT * FROM region where REG_CODE= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $laRegion=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Region"); // lit la ligne et renvoie un objet Artist
        return $laRegion[0];
		// ajouter la gestion des exceptions
    }

	// modifie un objet Artiste
    public static function modifierRegion($id,$nom)
    {
		// a completer
        $sql="update region set REG_NOM = :nom where REG_CODE = :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->bindParam(':nom', $nom);
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
    public static function RechercheRegion($char)
    {
        $sql = "SELECT * FROM REGION WHERE REG_NOM like '%".$char."%'";
        $monPdo = MonPdo::getInstance();
        $result = $monPdo->prepare($sql);
        $result->execute();
        $lesRegions=$result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Region");
        return $lesRegions;
        $monPdo == null;
    }
}
