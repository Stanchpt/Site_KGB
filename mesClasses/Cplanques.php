<?php

require_once 'mesClasses/Cdao.php';

class Cplanque
{
    public $idplanque;
    public $code;
    public $adresse;
    public $pays;
    public $typeplanque;

    function __construct($sidplanque,$scode,$sadresse,$spays,$stypeplanque) //s pour send param envoyé
    {
        $this->idplanque = $sidplanque;
        $this->code = $scode;
        $this->adresse= $sadresse;
        $this->pays = $spays;
        $this->typeplanque = $stypeplanque;
    }    
}

class Cplanques 
{
 
    private $ocollPlanqueById;
    private $tabPlanques;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM planques";
                            $odao = new Cdao();
                            $lesPlanques = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesPlanques as $unePlanque) 
                                {
                                    $oplanque = new Cplanque($unePlanque['idplanque'],$unePlanque['code'],$unePlanque['adresse'],$unePlanque['pays'],$unePlanque['typeplanque']);
                                    $this->tabPlanques[] = $oplanque;
				    $this->ocollPlanqueById[$unePlanque['idplanque']]=$oplanque;
                                } 
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getPlanqueById($sidplanque)
    {
        if(array_key_exists($sidplanque, $this->ocollPlanqueById))
        {
            $oplanque = $this->ocollPlanqueById[$sidplanque];
            return $oplanque;
        }
    }
    
    function getTabPlanque()
    {
        return $this->tabPlanques;
    }
   
   
    function InsertPlanques($scode,$sadresse,$spays,$stypeplanque)
    {
        $odao = new Cdao();
        $query = "INSERT INTO planques(idplanque,code,adresse,pays,typeplanque) 
            values(' NULL , '" . $sadresse . "', '". $scode."','".$spays. "','" .$stypeplanque. "')";
        $odao->Insert($query);
    }
    
    function UpdatePlanques($sid,$scode,$sadresse,$spays,$stypeplanque)
    {
        $odao = new Cdao();
        $query = "Update planques SET code='".$scode."adresse='".$sadresse.'"pays='.$spays.
                "'typeplanque='".$stypeplanque."WHERE idplanque=".$sid;         
        $odao->Update($query);
    }
    
    function DeletePlanques($sid)
    {
         //Suppression de la base
        $odao = new Cdao();
        $query = 'DELETE FROM planques WHERE idplanque ="'.$sid.'"';
        $odao->delete($query);
        //suppression de l'objet du dictionnaire dont la clef est l'id du FHF : si objetde contrôle dans une variable de session
        unset($this->ocollPlanqueById[$sid]);
        unset($odao);
    }
}
?>