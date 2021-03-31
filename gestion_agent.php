<?php

include_once 'include/head.php';
include_once 'include/navbar-admin.php';

include 'mesClasses/Cagents.php';
include 'mesClasses/Cpays.php';


//select
$oagent= new Cagents();
$tabagent=$oagent->getTabAgent();

//insert
if(isset($_POST['idagent'])&& isset($_POST['nom'])&&isset($_POST['prenom'])&& isset($_POST['datenaissance'])&&isset($_POST['login'])&& isset($_POST['mdp'])&&isset($_POST['nationalite'])&& isset($_POST['specialite']))
{
    $id=$_POST['idagent'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $datenaissance=$_POST['datenaissance'];
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    $nationalite=$_POST['nationalite'];
    $specialite=$_POST['specialite'];
    
    $insert=$oagent->Insertagent($id,$nom,$prenom,$datenaissance,$login,$mdp,$nationalite,$specialite);
    if($insert)
    {
        $_SERVER['PHP_SELF'];
    }
}


//delete
if(isset($_GET['id']))
{
    $suppragent=$oagent->Deleteagent($_GET['id']);
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
                  <span class="fa fa-cloud"></span> La table Agent :
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
                         <th>login</th> <!--nom de code de l'agent-->
                         <th>mdp</th>
                         <th>nationalite</th>
                         <th>specialite</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                     foreach($tabagent as $oagent)
                     {
                         echo '<tr>';
                         echo"<td>".$oagent->id."</td>"
                           ."<td>".$oagent->nom."</td>"
                           ."<td>".$oagent->prenom."</td>"
                           ."<td>".$oagent->datenaissance."</td>"
                           ."<td>".$oagent->login."</td>"
                           ."<td>".$oagent->mdp."</td>"
                           ."<td>".$oagent->nationalite."</td>"
                           ."<td>".$oagent->specialite."</td>";
                        echo '</tr>';
                     }
                     ?>
                 </tbody>
                 
             </table>
            </section>
                <br><br><br> 
            <!--Insert-->
            <section id="Insert-table">
                <div class='jumbotron align-items-center'>
                <h4>
                  <span class="fa fa-cloud"></span> Enregistrer un nouvel agent :
                </h4>
             <br>
                <form method="POST"><!--Insèrer une nouvelle ligne dans la table agent--> 
                    <table style='width:60%;'>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="idagent">Id :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="idagent" placeholder="ag" class="form-control" required>
                                </div>
                            <td>
                        </tr>
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
                                    <label for="login">Nom de code :</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="login" class="form-control" required>
                                </div>
                            <td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="mdp">Mot de passe:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="password" name="mdp" class="form-control" required>
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
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="specialite">Specialité:</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <textarea name="specialite" class='form-control' cols="3" required></textarea>
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
                          <span class="fa fa-cloud"></span> La table Agent(Modification/Suppression) :
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
                                 <th>login</th> <!--nom de code de l'agent-->
                                 <th>mdp</th>
                                 <th>nationalite</th>
                                 <th>specialite</th>
                                 <th></th>
                                 <th></th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                             foreach($tabagent as $oagent)
                             {
                                 echo '<tr>';
                                 echo"<td>".$oagent->id."</td>"
                                   ."<td>".$oagent->nom."</td>"
                                   ."<td>".$oagent->prenom."</td>"
                                   ."<td>".$oagent->datenaissance."</td>"
                                   ."<td>".$oagent->login."</td>"
                                   ."<td>".$oagent->mdp."</td>"
                                   ."<td>".$oagent->nationalite."</td>"
                                   ."<td>".$oagent->specialite."</td>"
                                   ."<td><a href='#' class='btn btn-success'>Update</a></td>"
                                   ."<td><a href='gestion_agent.php?id=".$oagent->id."' class='btn btn-danger'>Delete</a></td>";
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
