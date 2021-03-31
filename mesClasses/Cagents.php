<?php


require_once 'mesClasses/Cdao.php';

class Cagent
{
    public $id;
    public $nom;
    public $prenom;
    public $datenaissance;
    public $login; //=nom de code de l'agents
    public $mdp;
    public $nationalite; //= pays pour la suite... si italien alors dans la table faut mattre italie
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
    
    function Insertagent($sid,$snom,$sprenom,$sdatenaissance,$slogin,$smdp,$snationalite,$sspecialite)
    {
        $odao = new Cdao();
        $query = "INSERT INTO agents(id,nom,prenom,datenaissance,login,mdp,nationalite,specialite) 
            values('" . $sid . "', '" . $snom . "', '". $sprenom."','".$sdatenaissance. "','" .$slogin."','" .$smdp."','" .$snationalite. "','" .$sspecialite. "')";
        $odao->Insert($query);
    }
    
    function Updateagent($sid,$snom,$sprenom,$sdatenaissance,$slogin,$smdp,$snationalite,$sspecialite)
    {
        $odao = new Cdao();
        $query = "Update agents SET nom='".$snom."prenom='".$sprenom.'"datenaissance='.$sdatenaissance.
                '"login='.$slogin.'"mdp='.$smdp."'nationalite='".$snationalite.'specialite='.$sspecialite."WHERE id=".$sid;         
        $odao->Update($query);
    }
    
    function Deleteagent($sid)
    {
         //Suppression de la base
        $odao = new Cdao();
        $query = 'DELETE FROM agents WHERE id ="'.$sid.'"';
        $odao->delete($query);
        //suppression de l'objet du dictionnaire dont la clef est l'id du FHF : si objetde contrôle dans une variable de session
        unset($this->ocollAgentById[$sid]);
        unset($odao);
    }
}



