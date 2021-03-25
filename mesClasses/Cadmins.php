<?php


/* ************ Classe métier Cvisiteur et Classe de contrôle Cvisiteurs **************** */
require_once 'mesClasses/Cdao.php';

class Cadmin
{
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $mdp;
    public $datecreation;

    function __construct($sid,$snom,$sprenom,$semail,$smdp,$sdatecreation) //s pour send param envoyé
    {

        $this->id = $sid;
        $this->nom = $snom;
        $this->prenom = $sprenom;
        $this->email = $semail;
        $this->login = $slogin;
        $this->mdp = $smdp;
        $this->datecreation = $sdatecreation;
    }
    
}

class Cadmins 
{
 
    private $ocollAdminById;
    private $ocollAdminByEmail;
    private $tabAdmin;

    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM admin";
                            $odao = new Cdao();
                            $lesAdmins = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesAdmins as $unAdmin) 
                                {
                                    $oadmin = new Cadmin($unAdmin['id'],$unAdmin['nom'],$unAdmin['prenom'],$unAdmin['email'],$unAdmin['mdp'],$unAgent['datecreation']);
                                    $this->tabAdmin[] = $oadmin;
				    $this->ocollAdminById[$unAdmin['id']]=$oadmin;
				    $this->ocollAdminByEmail[$unAdmin['email']] = $oadmin;
                                }
    
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getAdminById($sid)
    {
        if(array_key_exists($sid, $this->ocollAdminById))
        {
            $oadmin = $this->ocollAdminById[$sid];
            return $oadmin;
        }
    }
            
    function getAdminByEmail($email)
    {
        if(array_key_exists($email, $this->ocollAdminByEmail))
        {
            $oadmin = $this->ocollAdminByAdmin[$Admin];
            return $oadmin;
        }
    }
            
    function verifierInfosConnexion($username,$pwd)
    {
        foreach ($this->ocollAdminById as $oadmin)
        {
            if($oadmin->login == $username && $oadmin->mdp == $pwd)
            {
                return $oadmin;
            }                  
        }
        return null;
    }
    
    function getTabAdmin()
    {
        return $this->tabAdmin;
    }
}



