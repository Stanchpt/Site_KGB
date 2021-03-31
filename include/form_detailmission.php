<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        // put your code here
        require_once'mesClasses/Cmissions.php';
        
            $id=@$_GET['id'];
            
            $omission=new Cmissions();

            $laMission=$omission->getMissionById($id);
        ?>
<br>
                    <div class="container">
                        <div class="jumbotron">
                            <div class='row'>
                                <div class='col-lg-12'>  
                                    <h1 class='text-center'><?=$laMission->titre?></h1>
                                    <br>
                                    <h3>Description :</h3>
                                    <p><?=$laMission->description?></p>
                                    <br>
                                    Nom de code de la mission: &nbsp;<h4><?=$laMission->nom2code?></h4> 
                                    <br>
                                    Specialité requise pour la mission :&nbsp;<?=$laMission->specialiterequise?>
                                    <br><br>
                                    Pays : &nbsp;<?=$laMission->pays?>
                                    <br>
                                    Nombre d'agent (possible) sur la mission : &nbsp;<?=$laMission->nbagents?>
                                    <br>
                                    Nombre de cible : &nbsp; <?=$laMission->nbcible?>
                                    <br>
                                    Nombre de planque disponible : &nbsp;<?=$laMission->nbplanque?>
                                    <br>
                                    Nombre de contact disponible autour de la cible : &nbsp; <?=$laMission->nbcontact?>
                                    <br>
                                    Type de mission : &nbsp;<?=$laMission->typemission?>
                                    <br><br>
                                    La statut de la mission : &nbsp;
                                    <?php
                                    $statut=$laMission->statutmission;
                                    switch($statut){
                                    case "EP":
                                        echo"En preparation";
                                        break;
                                    case "EC":
                                        echo"En cours";
                                        break;
                                    };
                                    ?>
                                    <br><br>
                                    Date de debut : <?php
                                    $datedeb=$laMission->datedeb;
                                    if(empty($datedeb))
                                    {
                                        echo "NULL";
                                    }
                                    else
                                    {
                                        echo $datedeb;
                                    }
                                    ?>
                                    
                                    <br><br>
                                    Date de fin : <?php
                                    $datefin=$laMission->datefin;
                                    if(empty($datefin))
                                    {
                                        echo "NULL";
                                    }
                                    else
                                    {
                                        echo $datefin;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
