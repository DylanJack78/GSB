<?php

class Medicament{

    private $MED_DEPOTLEGAL;
    private $FAM_CODE;
    private $MED_NOMCOMMERCIAL;
    private $MED_COMPOSITION;
    private $MED_EFFET;
    private $MED_CONTREINDIC;
    private $MED_PRIXECHANTILLON;

	public function __construct(){

	}

	public function setDepotLegal($depotLegal){
		$this->depotLegal = $depotLegal;
	}
	public function getDepotLegal(){
		return $this->MED_DEPOTLEGAL;
	}
	public function getNomCom(){
		return $this->MED_NOMCOMMERCIAL;
	}
	public function getEffets(){
		return $this->MED_EFFET;
	}
	public function getComposition(){
		return $this->MED_COMPOSITION;
	}
	public function getFamCode(){
		return $this->FAM_CODE;
	}
	public function getPrixEchantillon(){
		return $this->MED_PRIXECHANTILLON;
	}

	public function __toString(){

		return $this->getNomCom();
	}



	public static function getAll(){
		$unPdo = MonPdo::getInstance()->query("SELECT * from medicaments");
		$artistes = $unPdo->fetchAll(PDO::FETCH_CLASS, "Medicament");
		return $artistes;
	}
	public static function getMedicament($depotLegal){
		$unPdo = MonPdo::getInstance()->query("SELECT * from medicaments natural join famille where MED_DEPOTLEGAL=" . $depotLegal . "");
		$artistes = $unPdo->fetchObject("Medicament");
		return $artistes;
	}
	public static  function ajouterMedicament($famille, $nomCommercial, $composition, $effet, $contreIndic, $prixEchantillon){
		$unPdo = monPdo::getInstance()->prepare("INSERT into medicaments(FAM_CODE, MED_NOMCOMMERCIAL, MED_COMPOSITION, MED_EFFET, MED_CONTREINDIC, MED_PRIXECHANTILLON)
		values(:FAM_CODE, :MED_NOMCOMMERCIAL, :MED_EFFET, :MED_COMPOSITION, :MED_CONTREINDIC, :MED_PRIXECHANTILLON)");
		return $unPdo->execute(array(
			"FAM_CODE" => $famille,
			"MED_NOMCOMMERCIAL" => $nomCommercial,
			"MED_COMPOSITION" => $composition,
			"MED_EFFET" => $effet,
			"MED_CONTREINDIC" => $contreIndic,
			"MED_PRIXECHANTILLON" => $prixEchantillon
		));
	}
	public static function rechercheMedicament($larecherche){
	$unPdo = monPdo::getInstance()->query("SELECT MED_NOMCOMMERCIAL FROM medicaments Where MED_NOMCOMMERCIAL like '".$larecherche ."%'");
	$resultat = $unPdo->fetchObject("Medicament");
	return $resultat;
	}

	public static function supprimerMedicament($depotLegal){
		$unPdo = MonPdo::getInstance()->query("DELETE from interagir where MED_DEPOTLEGAL=" . $depotLegal . " or MED_MED_DEPOTLEGAL = " . $depotLegal . "");
		$unPdo->execute();
		$unPdo = MonPdo::getInstance()->query("DELETE from medicaments where MED_DEPOTLEGAL=" . $depotLegal . "");
		$unPdo->execute();
	}
	/*
	public function findById($id){
		$unPdo = monPdo::getInstance()->prepare("SELECT * from artist where id = :id");
		return $unPdo->execute(array(
			"id" => $id
		));
	}*/

}

?>
