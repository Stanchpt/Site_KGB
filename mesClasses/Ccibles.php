<?php

require_once 'mesClasses/Cdao.php';

class Ccible
{
    public $idcible;
    public $nom;
    public $prenom;
    public $datenaissance;
    public $nom2code;
    public $nationalite;

    function __construct($sidcible,$snom,$sprenom,$sdatenaissance,$snom2code,$snationalite) //s pour send param envoyé
    {
        $this->idcible = $sidcible;
        $this->nom = $snom;
        $this->prenom= $sprenom;
        $this->datenaissance = $sdatenaissance;
        $this->nom2code = $snom2code;
        $this->nationalite = $snationalite;
    }    
}

class Ccibles 
{
 
    private $ocollCibleById;
    private $tabCible;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM cibles";
                            $odao = new Cdao();
                            $lesCibles = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesCibles as $uneCible) 
                                {
                                    $ocible = new Ccible($uneCible['idcible'],$uneCible['nom'],$uneCible['prenom'],$uneCible['datenaissance'],$uneCible['nom2code'],$uneCible['nationalite']);
                                    $this->tabCible[] = $ocible;
				    $this->ocollCibleById[$uneCible['idcible']]=$ocible;
                                } 
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getCibleById($sidcible)
    {
        if(array_key_exists($sid, $this->ocollCibleById))
        {
            $ocible = $this->ocollCibleById[$sidcible];
            return $ocible;
        }
    }
    
    function getTabCible()
    {
        return $this->tabCible;
    }
   
   
       function Insertcible($snom,$sprenom,$sdatenaissance,$snom2code,$snationalite)
    {
        $odao = new Cdao();
        $query = "INSERT INTO cibles(idcible,nom,prenom,datenaissance,nom2code,nationalite) 
            values('NULL, '" . $snom . "', '". $sprenom."','".$sdatenaissance. "','" .$snom2code. "','" .$snationalite. "')";
        $odao->Insert($query);
    }
    
    function Updatecible($sid,$snom,$sprenom,$sdatenaissance,$snom2code,$snationalite)
    {
        $odao = new Cdao();
        $query = "Update cibles SET nom='".$snom."prenom='".$sprenom.'"datenaissance='.$sdatenaissance.
                "'nom2code='".$snom2code.'nationalite='.$snationalite."WHERE idcible=".$sid;         
        $odao->Update($query);
    }
    
    function Deletecible($sid)
    {
         //Suppression de la base
        $odao = new Cdao();
        $query = 'DELETE FROM cible WHERE idcible ="'.$sid.'"';
        $odao->delete($query);
        //suppression de l'objet du dictionnaire dont la clef est l'id du FHF : si objetde contrôle dans une variable de session
        unset($this->ocollCibleByIdById[$sid]);
        unset($odao);
    }
}
?>