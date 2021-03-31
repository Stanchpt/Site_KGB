<?php

require_once 'mesClasses/Cdao.php';

class Cpays
{
    public $id;
    public $nom;

    function __construct($sid,$snom) //s pour send param envoyé
    {
        $this->id = $sid;
        $this->nom = $snom;
    }
    
}

class Cpayss 
{
 
    private $ocollPaysById;
    private $tabPays;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM pays";
                            $odao = new Cdao();
                            $lesPays = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesPays as $unPays) 
                                {
                                    $opays = new Cpays($unPays['id'],$unPays['nom']);
                                    $this->tabPays[] = $opays;
				    $this->ocollPaysById[$unPays['id']]=$opays;
                                } 
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getpaysById($sid)
    {
        if(array_key_exists($sid, $this->ocollPaysById))
        {
            $opays = $this->ocollPaysById[$sid];
            return $opays;
        }
    }
    
    function getTabPays()
    {
        return $this->tabPays;
   }
}
?>