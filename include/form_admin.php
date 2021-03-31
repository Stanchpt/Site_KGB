<?php  
require_once 'mesClasses/Cadmins.php';
        
       session_start();
        if(isset($_POST['Email']) && isset($_POST['password']))
        {
            
            $lesAdmins = new Cadmins();
            $oadmin = $lesAdmins->verifierInfosConnexion($_POST['Email'], $_POST['password']);
                       
                $_SESSION['nom'] = $oadmin->nom;
                $_SESSION['prenom'] = $oadmin->prenom;
                $_SESSION['email'] = $oadmin->login;
                $_SESSION['datecreation'] = $oadmin->datecreation;
                $_SESSION['role'] = 'Administrateur';
               header('Location: Accueil-Admin.php');
        }
        else
            {
                $errorMsg = "Email ou Mot de passe incorrect";
            }
 ?>
<div class="container">
    <form class="form-horizontal" id="form" method="POST" action="<?= $formAction; ?>">
         <div class="login-box" id="lb-admin">
             <h1>Connectez-vous Administrateur !</h1>
            <div  id="tb-admin">
                <i class="fa fa-user"></i>
                <input type="email" placeholder="Email" name="Email" required>
            </div>
            <div  id="tb-admin">
                <i class="fa fa-lock"></i>
                <input type="password" placeholder="Password" name="password" required>
            </div>
             <center><button type="submit" name="LogIn" class="btn btn-success">Se Connecter</button>
             <a href="./SeConnecter.php" class="btn btn-danger">Retourner au client Agent >></a></center>
         </div>
      </form>
</div>

