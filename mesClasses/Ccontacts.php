<?php

require_once 'mesClasses/Cdao.php';

class Ccontact
{
    public $idcontact;
    public $nom;
    public $prenom;
    public $datenaissance;
    public $nom2code;
    public $nationalite;

    function __construct($sidcontact,$snom,$sprenom,$sdatenaissance,$snom2code,$snationalite) //s pour send param envoyé
    {
        $this->idcontact = $sidcontact;
        $this->nom = $snom;
        $this->prenom= $sprenom;
        $this->datenaissance = $sdatenaissance;
        $this->nom2code = $snom2code;
        $this->nationalite = $snationalite;
    }    
}

class Ccontacts 
{
 
    private $ocollContactById;
    private $tabContact;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM contacts";
                            $odao = new Cdao();
                            $lesContacts = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesContacts as $unContact) 
                                {
                                    $ocontact = new Ccontact($unContact['idcontact'],$unContact['nom'],$uunContact['prenom'],$unContact['datenaissance'],$unContact['nom2code'],$unContact['nationalite']);
                                    $this->tabContact[] = $ocontact;
				    $this->ocollContactById[$unContact['idcontact']]=$ocontact;
                                } 
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getContactById($sidcontact)
    {
        if(array_key_exists($sid, $this->ocollContactById))
        {
            $ocontact = $this->ocollContactById[$sidcontact];
            return $ocontact;
        }
    }
    
    function getTabContact()
    {
        return $this->tabContact;
    }
   
   
       function Insertcontact($sid,$snom,$sprenom,$sdatenaissance,$snom2code,$snationalite)
    {
        $odao = new Cdao();
        $query = "INSERT INTO contacts(idcontact,nom,prenom,datenaissance,nom2code,nationalite) 
            values(' NULL , '" . $snom . "', '". $sprenom."','".$sdatenaissance. "','" .$snom2code. "','" .$snationalite. "')";
        $odao->Insert($query);
    }
    
    function Updatecontact($sid,$snom,$sprenom,$sdatenaissance,$snom2code,$snationalite)
    {
        $odao = new Cdao();
        $query = "Update contacts SET nom='".$snom."prenom='".$sprenom.'"datenaissance='.$sdatenaissance.
                "'nom2code='".$snom2code.'nationalite='.$snationalite."WHERE idcontact=".$sid;         
        $odao->Update($query);
    }
    
    function Deletecontact($sid)
    {
         //Suppression de la base
        $odao = new Cdao();
        $query = 'DELETE FROM contact WHERE idcontact ="'.$sid.'"';
        $odao->delete($query);
        //suppression de l'objet du dictionnaire dont la clef est l'id du FHF : si objetde contrôle dans une variable de session
        unset($this->ocollContactById[$sid]);
        unset($odao);
    }
}
?>