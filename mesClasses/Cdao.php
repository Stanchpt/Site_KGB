<?php
class Cdao
{
    private function getPDO()
    {
        $strConnection = 'mysql:host=localhost;dbname=bdd_site_kgb'; // DSN
        $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); // demande format utf-8
        $pdo = new PDO($strConnection, 'root', '', $arrExtraParam); // Instancie la connexion
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// Demande la gestion d'exception car par défaut PDO ne la propose pas 
        return $pdo;
    }
    
    public function gettabDataFromSql($squery)
    {
        $pdo = $this->getPDO();        
        $tabdata = $pdo->query($squery);                       
        $this->ocoll= array();
        return $tabdata;
    }
    
    public function Insert($squery)
    {
        $pdo = $this->getPDO();        
        $prepare=$pdo->prepare($squery);
        $prepare->execute();
    }
    
    public function Delete($squery)
    {
        $pdo = $this->getPDO();        
        $prepare=$pdo->prepare($squery);
        $prepare->execute();
    }
    
    public function Update($squery)
    {
        $pdo = $this->getPDO();        
        $prepare=$pdo->prepare($squery);
        $prepare->execute();
    }
}
?>

