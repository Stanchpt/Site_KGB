<?php


/* ************ Classe métier Cvisiteur et Classe de contrôle Cvisiteurs **************** */
require_once 'mesClasses/Cdao.php';

class Cagent
{
    public $id;
    public $nom;
    public $prenom;
    public $datenaissance;
    public $login; //=nom de code de l'agents
    public $mdp;
    public $nationalite;
    public $nbspecialite;

    function __construct($sid,$snom,$sprenom,$sdatenaissance,$slogin,$smdp,$snationalite,$snbspecialite) //s pour send param envoyé
    {

        $this->id = $sid;
        $this->nom = $snom;
        $this->prenom = $sprenom;
        $this->datenaissance = $sdatenaissance;
        $this->login = $slogin;
        $this->mdp = $smdp;
        $this->nationalite = $snationalite;
        $this->specialite = $snbspecialite;
    }
    
}

class Cagents 
{
 
    private $ocollAgentById;
    private $ocollAgentByLogin;
    private $tabAgent;
    private $tabNationaliteAgent;
    private $lesnationalites;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM agents";
                            $odao = new Cdao();
                            $lesAgents = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesAgents as $unAgent) 
                                {
                                    $oagent = new Cagent($unAgent['id'],$unAgent['nom'],$unAgent['prenom'],$unAgent['datenaissance'],$unAgent['login'],$unAgent['mdp'],$unAgent['nationalite'],$unAgent['specialite']);
                                    $this->tabAgent[] = $oagent;
				    $this->ocollAgentById[$unAgent['id']]=$oagent;
				    $this->ocollAgentByLogin[$unAgent['login']] = $oagent;
                                }
                                
                            $query = "SELECT distinct nationalite FROM agent";
                            
                            $lesnationalites = $odao->gettabDataFromSql($query);
                            
                            
                            foreach ($lesnationalites as $unenatio)
                            {
                                $this->tabNationaliteAgent[] = $unenatio['nationalite'];
                                
                            }
                                
                      
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getAgentById($sid)
    {
        if(array_key_exists($sid, $this->ocollAgentById))
        {
            $oagent = $this->ocollAgentById[$sid];
            return $oagent;
        }
    }
            
    function getAgentByLogin($login)
    {
        if(array_key_exists($login, $this->ocollAgentByLogin))
        {
            $oagent = $this->ocollAgentByLogin[$login];
            return $oagent;
        }
    }
            
    function verifierInfosConnexion($username,$pwd)
    {
        foreach ($this->ocollAgentById as $oagent)
        {
            if($oagent->login == $username && $oagent->mdp == $pwd)
            {
                return $oagent;
            }                  
        }
        return null;
    }
    
    function getTabAgent()
    {
        return $this->tabAgent;
    }
}



