<?php
        // put your code here
        require_once'mesClasses/Cmissions.php';
        
            $omission=new Cmissions();

            $lesMissions=$omission->getTabMission();
            foreach ($lesMissions as $uneMission)
            {
        ?>
<br>
                    <div class="container">
                        <div class="jumbotron">
                            <div class='row'>
                                <div class='col-lg-12'>  
                                    <h2 class='text-center'><?=$uneMission->titre?></h2>
                                    <br>
                                    Pays : <?=$uneMission->pays?>
                                    <br>
                                    Nombre de cible : <?=$uneMission->nbcible?>
                                    <br>
                                    Nombre d'agent : <?=$uneMission->nbagents?>
                                    <br>
                                    <br>
                                    <a href='./DetailMissions.php?id=<?=$uneMission->idmission?>' class='btn btn-lg btn-info'>En savoir plus >></a>
                                </div>
                            </div>
                        </div>
                    </div>
    <?php
            }
     ?>

