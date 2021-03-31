<?php

require_once 'mesClasses/Cdao.php';


class Cmission {
    //put your code here
    public $idmission;
    public $titre;
    public $description;
    public $nom2code;
    public $pays;
    public $nbagents;
    public $nbcontact;
    public $nbcible;
    public $typemission;
    public $statutmission;
    public $nbplanque;
    public $specialiterequise;
    public $datedeb;
    public $datefin;

    function __construct($sidmission,$stitre,$sdescription,$snom2code,$spays,$snbagents,$snbcontact,$snbcible,$stypemission,$sstatutmission,$snbplanque,$sspecialiterequise,$sdatedeb,$sdatefin) //s pour send param envoyé
    {

        $this->idmission = $sidmission;
        $this->titre = $stitre;
        $this->description = $sdescription;
        $this->nom2code = $snom2code;
        $this->pays = $spays;
        $this->nbagents = $snbagents;
        $this->nbcontact = $snbcontact;
        $this->nbcible = $snbcible;
        $this->typemission = $stypemission;
        $this->statutmission = $sstatutmission;
        $this->nbplanque = $snbplanque;
        $this->specialiterequise = $sspecialiterequise;
        $this->datedeb = $sdatedeb;
        $this->datefin = $sdatefin;
    }
}
class Cmissions {
    //put your code here
    private $ocollMissionById;
    private $tabMission;


    public function __construct()
    {
       
                  try {
                            $query = "SELECT * FROM missions";
                            $odao = new Cdao();
                            $lesMissions = $odao->gettabDataFromSql($query);
                            
                            foreach ($lesMissions as $uneMission) 
                                {
                                    $omission = new Cmission($uneMission['idmission'],$uneMission['titre'],$uneMission['description'],$uneMission['nom2code'],$uneMission['pays'],$uneMission['nbagents'],$uneMission['nbcontact'],$uneMission['nbcible'],
                                            $uneMission['typemission'],$uneMission['statutmission'],$uneMission['nbplanque'],$uneMission['specialiterequise'],$uneMission['datedeb'],$uneMission['datefin']);
                                    $this->tabMission[] = $omission;
				    $this->ocollMissionById[$uneMission['idmission']]=$omission;
                                }
                        }
                  catch(PDOException $e) {
                         $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                         die($msg);
                        }

    }


    function getMissionById($sid)
    {
        if(array_key_exists($sid, $this->ocollMissionById))
        {
            $omission = $this->ocollMissionById[$sid];
            return $omission;
        }
    }
    
    function getTabMission()
    {
        return $this->tabMission;
    }
    
    function Insertmission($sid,$stitre,$sdescription,$snom2code,$spays,$snbagents,$snbcontact,$snbcible,$stypemission,$sstatutmission,$snbplanque,$sspecialiterequise,$sdatedeb,$sdatefin)
    {
        $odao = new Cdao();
        $query = "INSERT INTO missions(idmission,titre,description,nom2code,pays,nbagents,nbcontact,nbcible,typemission,statutmission,nbplanque,specialiterequise,datedeb,datefin) 
            values('" . $sid . "', '" . $stitre . "', '". $sdescription."','".$snom2code. "','" .$spays."','" .$snbagents."','" .$snbcontact. "','" .$snbcible."','" .$stypemission."','" .$sstatutmission."','" .$snbplanque. "','".$sspecialiterequise."','" .$sdatedeb."','" .$sdatefin. "')";
        $odao->Insert($query);
    }
    
    function Updatemission($sid,$stitre,$sdescription,$snom2code,$spays,$snbagents,$snbcontact,$snbcible,$stypemission,$sstatutmission,$snbplanque,$sspecialiterequise,$sdatedeb,$sdatefin)
    {
        $odao = new Cdao();
        $query = "Update missions SET titre='".$stitre.'",description='.$sdescription.'",nom2code='.$snom2code.'",pays='.$spays."',nbagents='".$snbagents.',nbcontact='.$snbcontact.
        '",nbcible='.$snbcible.'",typemission='.$stypemission."',statutmission='".$sstatutmission.',nbplanque='.$snbplanque.'",specialiterequise='.$sspecialiterequise.'",datedeb='.$sdatedeb."',datefin='".$sdatefin."WHERE idmission=".$sid;         
        $odao->Update($query);
    }
    
    function Deletemission($sid)
    {
         //Suppression de la base
        $odao = new Cdao();
        $query = 'DELETE FROM missions WHERE idmission ="'.$sid.'"';
        $odao->delete($query);
        //suppression de l'objet du dictionnaire dont la clef est l'id du FHF : si objetde contrôle dans une variable de session
        unset($this->ocollAgentById[$sid]);
        unset($odao);
    }
}
