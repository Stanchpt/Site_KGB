<?php

require_once 'mesClasses/Cdao.php';

class Cetat
{
    public $id;
    public $libelle;

    function __construct($sid,$slibelle) //s pour send param envoyé
    {
        $this->id = $sid;
        $this->libelle = $slibelle;
    }
    
}

class Cetats 
{
 
    private $ocollEtatById;
    private $tabEtat;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM etat";
                            $odao = new Cdao();
                            $lesEtat = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesEtat as $unEtat) 
                                {
                                    $oetat = new Cetat($unEtat['id'],$unEtat['libelle']);
                                    $this->tabEtat[] = $oetat;
				    $this->ocollEtatById[$unEtat['id']]=$oetat;
                                } 
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getetatById($sid)
    {
        if(array_key_exists($sid, $this->ocollEtatById))
        {
            $oetat = $this->ocollEtatById[$sid];
            return $oetat;
        }
    }
    
    function getTabEtat()
    {
        return $this->tabEtat;
   }
}
?>
