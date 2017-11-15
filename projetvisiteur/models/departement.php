<?php
class Departement{

	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM DEPARTEMENT " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesDep=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Departement');
        return $lesDep;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }

	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function ajouterDep($nom,$chef_vente)
    {
		$sql="insert into departement values('', :nom, :cv)" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':adr', $chef_vente);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }

	//supprime un artiste dont on passe l'id en paramètre
    public static function supprimerDep($id)
    {
		// a completer
        $sql="delete from departement where DEP_CODE = :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function findById($id)
    {
        $sql="SELECT * FROM departement where DEP_CODE = ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leDep=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Departement"); // lit la ligne et renvoie un objet Artist
        return $leDep[0];
		// ajouter la gestion des exceptions
    }

	// modifie un objet Artiste
    public static function modifierDep($id,$nom,$chef_vente)
    {
		// a completer
        $sql="update departement set DEP_NOM = :nom, DEP_CHEFVENTE = :cv where DEP_CODE = :id" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->bindParam(':nom', $nom);
        $resultat->bindParam(':adr', $chef_vente);
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
    public static function RechercheDep($char)
    {
        $sql = "SELECT * FROM DEPARTEMENT WHERE DEP_NOM like '%".$char."%'";
        $monPdo = MonPdo::getInstance();
        $result = $monPdo->prepare($sql);
        $result->execute();
        $lesDep=$result->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Departement");
        return $lesDep;
        $monPdo == null;
    }
}
