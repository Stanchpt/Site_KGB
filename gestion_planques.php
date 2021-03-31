<?php

include_once 'include/head.php';
include_once 'include/navbar-admin.php';

include 'mesClasses/Cplanques.php';
include 'mesClasses/Cpays.php';


//select
$oplanque= new Cplanques();
$tabplanque=$oplanque->getTabPlanque();

//insert
if(isset($_POST['idplanque'])&& isset($_POST['code'])&&isset($_POST['adresse'])&& isset($_POST['pays'])&&isset($_POST['typeplanque']))
{
    $id=$_POST['idplanque'];
    $code=$_POST['code'];
    $adresse=$_POST['adresse'];
    $pays=$_POST['pays'];
    $typeplanque=$_POST['typeplanque'];
    
    $insert=$oplanque->InsertPlanques($id,$code,$adresse,$pays,$typeplanque);
}

//delete
if(isset($_GET['id']))
{
    $supprplanque=$ocible->DeletePlanques($_GET['id']);
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
                  <span class="fa fa-cloud"></span> La table Planque :
                </h4>
             <br>
             <table class='table table-borderer'> 
                 <thead style='background-color: skyblue'>
                     <tr>
                         <th>id</th>
                         <th>code</th>
                         <th>adresse</th>
                         <th>pays</th>
                         <th>type de planque</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($tabplanque as $oplanque)
                     {
                         echo '<tr>';
                         echo"<td>".$oplanque->idplanque."</td>"
                           ."<td>".$oplanque->code."</td>"
                           ."<td>".$oplanque->adresse."</td>"
                           ."<td>".$oplanque->pays."</td>"
                           ."<td>".$oplanque->typeplanque."</td>";
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
                  <span class="fa fa-cloud"></span> Enregistrer une nouvelle planque :
                </h4>
             <br>
                <form method="POST"><!--Insèrer une nouvelle ligne dans la table agent--> 
                    <table style='width:60%;'>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="code">Code :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="code" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="adresse">adresse:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="adresse" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="pays">Pays:</label>
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
                                    <label for="typeplanque">type de planque:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="typeplanque" class="form-control" required>
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
                          <span class="fa fa-cloud"></span> La table Planques(Modification/Suppression) :
                         </span>
                        </h4>
                     <br>
                     <table class='table table-borderer'> 
                         <thead style='background-color: skyblue'>
                             <tr>                         
                                <th>id</th>
                                <th>code</th>
                                <th>adresse</th>
                                <th>pays</th>
                                <th>type de planque</th>
                                <th></th>
                                <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach($tabplanque as $oplanque)
                             {
                                 echo '<tr>';
                                 echo"<td>".$oplanque->idplanque."</td>"
                                ."<td>".$oplanque->code."</td>"
                                ."<td>".$oplanque->adresse."</td>"
                                ."<td>".$oplanque->pays."</td>"
                                ."<td>".$oplanque->typeplanque."</td>"
                                ."<td><a href='#' class='btn btn-success'>Update</a></td>"
                                ."<td><a href='gestion_planques.php?id=".$oplanque->idplanque."' class='btn btn-danger'>Delete</a></td>";
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
