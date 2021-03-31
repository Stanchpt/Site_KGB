<?php

include_once 'include/head.php';
include_once 'include/navbar-admin.php';

include 'mesClasses/Ccibles.php';
include 'mesClasses/Cpays.php';


//select
$ocible= new Ccibles();
$tabcible=$ocible->getTabCible();

//insert
if(isset($_POST['idcible'])&& isset($_POST['nom'])&&isset($_POST['prenom'])&& isset($_POST['datenaissance'])&&isset($_POST['nom2code'])&& isset($_POST['nationalite']))
{
    $id=$_POST['idcible'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $datenaissance=$_POST['datenaissance'];
    $nom2code=$_POST['nom2code'];
    $nationalite=$_POST['nationalite'];
    
    $insert=$ocible->Insertcible($id,$nom,$prenom,$datenaissance,$nom2code,$nationalite);
}

//delete
if(isset($_GET['id']))
{
    $supprcible=$ocible->DeleteCible($_GET['id']);
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
                  <span class="fa fa-cloud"></span> La table Cible :
                 </span>
                </h4>
             <br>
             <table class='table table-borderer'> 
                 <thead style='background-color: skyblue'>
                     <tr>
                         <th>id</th>
                         <th>nom</th>
                         <th>prenom</th>
                         <th>date de naissance</th>
                         <th>Nom de code</th>
                         <th>nationalite</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($tabcible as $ocible)
                     {
                         echo '<tr>';
                         echo"<td>".$ocible->idcible."</td>"
                           ."<td>".$ocible->nom."</td>"
                           ."<td>".$ocible->prenom."</td>"
                           ."<td>".$ocible->datenaissance."</td>"
                           ."<td>".$ocible->nom2code."</td>"
                           ."<td>".$ocible->nationalite."</td>";
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
                  <span class="fa fa-cloud"></span> Enregistrer une nouvelle cible :
                </h4>
             <br>
                <form method="POST"><!--Insèrer une nouvelle ligne dans la table agent--> 
                    <table style='width:60%;'>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="nom">nom :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="prenom">Prenom :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="prenom" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="datenaissance">Date de naissance :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" name="datenaissance" class="form-control" required>
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
                                    <label for="nationalite">Nationalité:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <select name="nationalite" class="form-control" required>
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
                                 <th>nom</th>
                                 <th>prenom</th>
                                 <th>date de naissance</th>
                                 <th>nom de code</th>
                                 <th>nationalite</th>
                                 <th></th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach($tabcible as $ocible)
                             {
                                 echo '<tr>';
                                 echo"<td>".$ocible->idcible."</td>"
                                   ."<td>".$ocible->nom."</td>"
                                   ."<td>".$ocible->prenom."</td>"
                                   ."<td>".$ocible->datenaissance."</td>"
                                   ."<td>".$ocible->nom2code."</td>"
                                   ."<td>".$ocible->nationalite."</td>"
                                   ."<td><a href='#' class='btn btn-success'>Update</a></td>"
                                   ."<td><a href='gestion_cible.php?id=".$ocible->idcible."' class='btn btn-danger'>Delete</a></td>";
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
