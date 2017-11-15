<?php

class Prescription{

    private $MED_DEPOTLEGAL;
    private $MED_MED_DEPOTLEGAL;

	public function __construct(){

	}

	public function setMed1($med1){
		$this->MED_DEPOTLEGAL = $med1;
	}
	public function getMed1(){
		return $this->MED_DEPOTLEGAL;
	}
	public function setMed2($med2){
		$this->MED_MED_DEPOTLEGAL = $med2;
	}
	public function getMed2(){
		return $this->MED_MED_DEPOTLEGAL;
	}

	public static function supprimerPrescription($depotLegal){
		$unPdo = MonPdo::getInstance()->query("DELETE from interagir where MED_DEPOTLEGAL=" . $depotLegal . " or MED_MED_DEPOTLEGAL = " . $depotLegal . "");
		$unPdo->execute();
	}
	public static function getPrescription($medicament){
		$unPdo = MonPdo::getInstance()->query("SELECT * from interagir where MED_DEPOTLEGAL=" . $medicament . " or MED_MED_DEPOTLEGAL=" . $medicament . "");
		$prescription = $unPdo->fetchObject("Prescription");
		if($prescription != null){
			return $prescription;
		}else{
			return null;
		}
	}

	public static function getPrescriptions($medicament){
		$unPdo = MonPdo::getInstance()->query("SELECT * from interagir where MED_DEPOTLEGAL=" . $medicament . " or MED_MED_DEPOTLEGAL=" . $medicament . "");
		$prescription = $unPdo->fetchAll(PDO::FETCH_CLASS, "Prescription");
		if($prescription != null){
			return $prescription;
		}else{
			return null;
		}
	}
	public static function getAll(){
		$unPdo = MonPdo::getInstance()->query("SELECT * from interagir");
		$prescriptions = $unPdo->fetchAll(PDO::FETCH_CLASS, "Prescription");
		return $prescriptions;
	}
	public static  function ajouterPrescription($medicament1, $medicament2){
		$unPdo = monPdo::getInstance()->prepare("INSERT into interagir(MED_DEPOTLEGAL, MED_MED_DEPOTLEGAL) values(:MED_DEPOTLEGAL, :MED_MED_DEPOTLEGAL)");
		return $unPdo->execute(array(
			"MED_DEPOTLEGAL" => $medicament1,
			"MED_MED_DEPOTLEGAL" => $medicament2
		));
	}/*
	public function findById($id){
		$unPdo = monPdo::getInstance()->prepare("SELECT * from artist where id = :id");
		return $unPdo->execute(array(
			"id" => $id
		));
	}*/

}

?>
