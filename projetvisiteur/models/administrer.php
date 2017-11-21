<?php
class Administrer {
    private $id;
    private $mdp;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
        $this->id=$value;
    }
    public function getMdp()
    {
        return $this->mdp;
    }
    public function setMdp($value)
    {
        $this->mdp=$value;
    }
    public static function RechercheConnexion($log,$mdp)
    {
        $sql="SELECT * FROM parametre where id=".$log." and pwd=".$mdp."" ;
        $resultat=MonPdo::getInstance()->query($sql);
        $laConnex=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Administrer');
        if ($laConnex == null)
        {
            return "Identifiant ou Mot de Passe erroné.";
        }
        else
        {
            return $laConnex;
        }
		throw new Exception("Problème dans la connexion.") ;
    }
}
