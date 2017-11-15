<?php
/**
* Classe d'acces aux donnees Utilise les services de la classe PDO pour l'application dvd
* Les attributs sont tous statiques, les 4 premiers pour la connexion
* $monMonPdo qui contiendra l'unique instance de la classe
* @author mcm
* @version 2.0
* @link http://www.php.net/manual/fr/book.pdo.php
*/
class MonPdo
{
	private static $serveur='mysql:host=localhost';
	private static $bdd='dbname=projet_GSB_visiteur';
	private static $user='root' ;
	private static $mdp='' ;
	private static $monPdo;
	private static $monMonPdo = null;
	/**
	* Constructeur privÃ©, crÃ©e l'instance de PDO qui sera sollicitÃ©e
	* pour toutes les mÃ©thodes de la classe
	*/
	private function __construct()
	{
		MonPdo::$monPdo = new PDO(MonPdo::$serveur.';'.MonPdo::$bdd, MonPdo::$user, MonPdo::$mdp);
		MonPdo::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		MonPdo::$monPdo = null;
	}
	/**
	* Fonction statique qui cree l'unique instance de la classe
	* Appel : $instanceMonPdo = MonPdo::getMonPdo();
	* @return l'unique objet de la classe MonPdo
	*/
	public static function getInstance()
	{
		if(MonPdo::$monPdo == null)
		{
			MonPdo::$monMonPdo= new MonPdo();
		}
		return MonPdo::$monPdo;
	}


}
?>
