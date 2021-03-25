<?php
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
    $role=$_SESSION['role'];
    $activepage=basename($_SERVER['PHP_SELF'],".php");
?>
      <!-- Static navbar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                <a  href="./Accueil.php"><img src="./image/logo-gsb.png" alt="Logo-GSB" id="img-logo" style="width:5rem; height: auto; margin-top:0.6em;"/></a>
                &nbsp;&nbsp;
            </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                      <li class="<?=($activepage=='Accueil')?'active':''?>"><a href="./Accueil.php"><span class="fa fa-home"></span>&nbsp; Accueil</a></li>
             <?php
              if($role == 'visiteur')
                    {
             ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Fiche Frais<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Saisir des fiches frais </li>
                        <li class="<?=($activepage=='SaisieFF')?'active':''?>"><a href="SaisieFF.php"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Saisie des fiches frais </a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Valider les fiches de frais</li>
                        <li><a href="#"><span class="glyphicon glyphicon-ok">&nbsp;</span>Validation fiches de frais</a></li>
                    </ul>
                </li>
                 <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Location/Mise à disposition de vehicules<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Voir les vehicules disponibles</li>
                            <li class="<?=($activepage=='VehiculeDispo')?'active':''?>"><a href="./VehiculeDispo.php"><span class="fa fa-car"></span>&nbsp;Véhicules disponibles</a></li>
                        <li class="divider" role="separator"></li>
                        <li class="dropdown-header">Louer un vehicule</li>
                            <li class="<?=($activepage=='Location-Vehicules')?'active':''?>"><a href="./Location-Vehicules.php"><span class="fa fa-cart-arrow-down"></span>&nbsp;Louer un véhicule</a></li>
                        <li class="divider" role="separator"></li>
                        <li class="dropdown-header">Gérer mes locations</li>
                            <li class="<?=($activepage=='Mesreservations')?'active':''?>"><a href="./Mesreservations.php"><span class="fa fa-car"></span>&nbsp;Mes réservations</a></li>
                    </ul>
                </li>
            <?php
            }
                if($role == 'comptable')
                    {
                ?>                     
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Comptable <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Rechercher un ou des visiteur(s)</li>
                        <li class="<?=($activepage=='formRechVisiteur')?'active':''?>"><a href="formRechVisiteur.php"><span class="glyphicon glyphicon-search">&nbsp;</span>Recherche visiteurs</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Valider les fiches frais des visiteurs</li>
                        <li><a href="#"><span class="glyphicon glyphicon-ok">&nbsp;</span>Validation des fiches de frais</a></li>
                    </ul>
                </li>  
               <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Location/Mise à disposition de vehicules<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Voir les vehicules disponibles</li>
                            <li class="<?=($activepage=='VehiculeDispo')?'active':''?>"><a href="./VehiculeDispo.php"><span class="fa fa-car"></span>&nbsp;Véhicules disponibles</a></li>
                        <li class="divider" role="separator"></li>
                        <li class="dropdown-header">Louer un vehicule</li>
                            <li class="<?=($activepage=='Location-Vehicules')?'active':''?>"><a href="./Location-Vehicules.php"><span class="fa fa-cart-arrow-down"></span>&nbsp;Louer une vehicule</a></li>
                        <li class="divider" role="separator"></li>
                        <li class="dropdown-header">Gérer mes locations</li>
                            <li class="<?=($activepage=='Mesreservations')?'active':''?>"><a href="./Mesreservations.php"><span class="fa fa-car"></span>&nbsp;Mes réservations</a></li>
                    </ul>
                </li>
                <?php
                    }
                    if($role == 'Direction')
                    {
                ?> 
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Ressources Humaines<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Saisir des employés</li>
                        <li class="<?=($activepage=='SaisieNouvelEmploye')?'active':''?>"><a href="SaisieNouvelEmploye.php"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Saisie des nouveaux employés</a></li>                        
                        <li class="divider" role="separator"></li>
                        <li class="dropdown-header">Gestion des employés</li>
                        <li class="<?=($activepage=='GestionEmploye')?'active':''?>"><a href="GestionEmploye.php"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Gestion des employés</a></li>                        
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestions des vehicules<span class="caret"></span></a>
                   <ul class="dropdown-menu">
                    <li class="dropdown-header">Saisir les nouveaux véhicules</li>
                        <li class="<?=($activepage=='SaisieNouveauVehicule')?'active':''?>"><a href="SaisieNouveauVehicule.php"><span class="glyphicon glyphicon-pencil">&nbsp;</span>Saisie des nouveaux Vehicules</a></li>
                    <li class='divider' role='separator'></li>
                        <li class='dropdown-header'>Recapitulatif des vehicules inscrient</li>
                            <li class="<?=($activepage=='Recap_vehicule')?'active':''?>"><a href="Recap_vehicule.php"><span class="glyphicon glyphicon-pencil">&nbsp;</span> Recapitulatif de tout les Vehicules</a></li>
                   </ul>
                </li>
                <?php
                    }
                ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?=($activepage=='Profil')?'active':''?>"><a href="./Profil.php"><span class="fa fa-user-circle"></span> &nbsp; <?=$prenom." ".$nom."(".$role.")";?></a></li>
                  <li><a href="./seConnecter.php">Deconnexion <span class="glyphicon glyphicon-log-out"></span></a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>