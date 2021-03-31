<?php

include_once 'include/head.php';
include_once 'include/navbar-admin.php';

include 'mesClasses/Cmissions.php';
include 'mesClasses/Cpays.php';
include 'mesClasses/Cetat.php';



//select
$omission= new Cmissions();
$tabmission=$omission->getTabMission();

//insert
if(isset($_POST['idmission'])&& isset($_POST['titre'])&&isset($_POST['description'])&& isset($_POST['nom2code'])&&isset($_POST['pays'])&& isset($_POST['nbagents'])
        && isset($_POST['nbcontact']) && isset($_POST['nbcible'])&& isset($_POST['typemission'])&& isset($_POST['statutmission'])&& isset($_POST['nbplanque']) && isset($_POST['specialiterequise'])
        && isset($_POST['datedeb'])  && isset($_POST['datefin']))
{
    $id=$_POST['idmission'];
    $titre=$_POST['titre'];
    $description=$_POST['description'];
    $nom2code=$_POST['nom2code'];
    $pays=$_POST['pays'];
    $nbagents=$_POST['nbagents'];
    $nbcontact=$_POST['nbcontact'];
    $nbcible=$_POST['nbcible'];
    $typemission=$_POST['typemission'];
    $statutmission=$_POST['statutmission'];
    $specialiterequise=$_POST['specialiterequise'];
    $datedeb=$_POST['datedeb'];
    $datefin=$_POST['datefin'];
    
    $insert=$omission->Insertmission($id,$titre,$description,$nom2code,$pays,$nbagents,$nbcontact,$nbcible,$typemission,$statutmission,$nbplanque,$specialiterequise,$datedeb,$datefin);
}

//delete
if(isset($_GET['id']))
{
    $supprmission=$omission->Deletemission($_GET['id']);
    $_SERVER['PHP_SELF'];
}


?>

<div class="content-container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">                
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="#">Requêtes disponibles</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="#Select-table">Select </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#Insert-table">Insert</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#Update-table">Update</a>
                  </li>
                </ul>
              </div>
            </nav>
                <br>
            <section id="Select-table">
                <br>
                <h4>
                  <span class="fa fa-cloud"></span> La table Missions :
                 </span>
                </h4>
             <br>
             <table class='table table-borderer'> 
                 <thead style='background-color: skyblue'>
                     <tr>
                         <th>id</th>
                         <th>titre</th>
                         <th>description</th>
                         <th>Nom de code</th>
                         <th>pays</th>
                         <th>nbagents</th>
                         <th>nbcontact</th>
                         <th>nbcible</th>
                         <th>typemission</th>
                         <th>statutmission</th>
                         <th>nbplanque</th>
                         <th>specialite requise</th>
                         <th>datedeb</th>
                         <th>datefin</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($tabmission as $omission)
                     {
                         echo '<tr>';
                         echo"<td>".$omission->idmission."</td>".
                             "<td>".$omission->titre."</td>".
                             "<td>".$omission->description."</td>".
                             "<td>".$omission->nom2code."</td>".
                             "<td>".$omission->pays."</td>".
                             "<td>".$omission->nbagents."</td>".
                             "<td>".$omission->nbcontact."</td>".
                             "<td>".$omission->nbcible."</td>".    
                             "<td>".$omission->typemission."</td>";  
                ?>
                              <td>
                                 <?php
                                 $etat=$omission->statutmission;
                                 switch($etat)
                                 {
                                 case "CH":
                                     echo"Echec";
                                     break;
                                 case "EC":
                                     echo"En cours";
                                     break;
                                 case "TR":
                                     echo"Terminé";
                                     break;
                                 default:
                                     echo"En preparation";
                                 }
                                 ?>
                             </td>  
                <?php
                         echo"<td>".$omission->nbplanque."</td>".    
                             "<td>".$omission->specialiterequise."</td>".    
                             "<td>".$omission->datedeb."</td>".    
                             "<td>".$omission->datefin."</td>";
                        echo '</tr>';
                     }
                     ?>
                 </tbody>
                 
             </table>
            </section>
                <br><br>
            <!--Insert-->
            <section id="Insert-table">
                <div class='jumbotron align-items-center'>
                <h4>
                  <span class="fa fa-cloud"></span> Enregistrer une nouvelle mission :
                </h4>
             <br>
                <form method="POST"><!--Insèrer une nouvelle ligne dans la table agent--> 
                    <table style='width:60%;'>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="idmission">id de la mission :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="idmission" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="titre">titre :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="titre" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="description">description:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea name="description" class='form-control' cols="3" required></textarea>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nom2code">Nom de code :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="nom2code" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="pays">pays:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="pays" class="form-control" required>
                                        <?php 
                                            $opays= new Cpayss();
                                            $tabpays=$opays->getTabPays();
                                            foreach ($tabpays as $unpays)
                                            {
                                        ?>
                                        <option value='<?=$unpays->nom?>'><?=$unpays->nom?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nbagents">nbagents :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="nbagents" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nbcontact">nbcontact :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="nbcontact" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nbcible">nbcible:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="nbcible" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="typemission">type de mission :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="typemission" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="statutmission">statut mission :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="statutmission" class="form-control" required>
                                        <?php 
                                            $oetat= new Cetats();
                                            $tabetat=$oetat->getTabEtat();
                                            print_r($tabetat);
                                            foreach ($tabetat as $unetat)
                                            {
                                        ?>
                                        <option value='<?=$unetat->id?>'><?=$unetat->libelle?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nbplanque">nbplanque :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="nbplanque" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="specialiterequise">specialite requise :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea name="specialiterequise" class='form-control' cols="3" required></textarea>
                                </div>
                            <td>
                        </tr>
                        
                        <tfoot>
                            <tr>
                                <td>
                                    <button type="submit" name="Enregistrer" class="btn btn-primary">Enregistrer</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                </div>
            </section>
            
            <br><br><br>
            <!--Update/Delete-->    
            <section id="Update-table">
                        <br>
                        <h4>
                          <span class="fa fa-cloud"></span> La table Cibles(Modification/Suppression) :
                         </span>
                        </h4>
                     <br>
                     <table class='table table-borderer'> 
                         <thead style='background-color: skyblue'>
                             <tr>
                                <th>id</th>
                                <th>titre</th>
                                <th>description</th>
                                <th>Nom de code</th>
                                <th>pays</th>
                                <th>nbagents</th>
                                <th>nbcontact</th>
                                <th>nbcible</th>
                                <th>typemission</th>
                                <th>statutmission</th>
                                <th>nbplanque</th>
                                <th>specialite requise</th>
                                <th>datedeb</th>
                                <th>datefin</th>
                                <th></th>
                                <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach($tabmission as $omission)
                             {
                                echo '<tr>';
                                echo"<td>".$omission->idmission."</td>".
                                    "<td>".$omission->titre."</td>".
                                    "<td>".$omission->description."</td>".
                                    "<td>".$omission->nom2code."</td>".
                                    "<td>".$omission->pays."</td>".
                                    "<td>".$omission->nbagents."</td>".
                                    "<td>".$omission->nbcontact."</td>".
                                    "<td>".$omission->nbcible."</td>".    
                                    "<td>".$omission->typemission."</td>";  
                       ?>
                                     <td>
                                        <?php
                                        $etat=$omission->statutmission;
                                        switch($etat)
                                        {
                                        case "CH":
                                            echo"Echec";
                                            break;
                                        case "EC":
                                            echo"En cours";
                                            break;
                                        case "TR":
                                            echo"Terminé";
                                            break;
                                        default:
                                            echo"En preparation";
                                        }
                                        ?>
                                    </td>  
                       <?php
                                echo"<td>".$omission->nbplanque."</td>".    
                                    "<td>".$omission->specialiterequise."</td>".    
                                    "<td>".$omission->datedeb."</td>".    
                                    "<td>".$omission->datefin."</td>"
                                   ."<td><a href='#' class='btn btn-success'>Update</a></td>"
                                   ."<td><a href='gestion_cible.php?id=".$omission->idmission."' class='btn btn-danger'>Delete</a></td>";
                                echo '</tr>';
                             }
                             ?>
                         </tbody>
                     </table>
                    </section>
            </div>
        </div>
    </div>
</div>
