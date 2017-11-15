<?php

class Famille{

    private $FAM_CODE;
    private $FAM_LIBELLE;

	public function __construct(){

	}
    public function getCode(){
        return $this->FAM_CODE;
    }
    public function getLibelle(){
        return $this->FAM_LIBELLE;
    }

	public static function getAll(){
		$unPdo = MonPdo::getInstance()->query("SELECT * from famille");
		$artistes = $unPdo->fetchAll(PDO::FETCH_CLASS, "Famille");
		return $artistes;
	}
	public static  function ajouterFamille($fam_code){
		$unPdo = monPdo::getInstance()->prepare("INSERT into famille(FAM_CODE) values(:fam_code)");
		return $unPdo->execute(array(
			"fam_code" => $fam_code
		));
	}
}

?>
