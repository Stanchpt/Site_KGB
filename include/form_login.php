<?php 
      require_once './mesClasses/Cagents.php';//accès à la classe de contrôle 
       session_start();
        if(isset($_POST['username']) && isset($_POST['pwd']))
        {
            
            $lesAgents = new Cagents();
            $oagent = $lesAgents->verifierInfosConnexion($_POST['username'], $_POST['pwd']);
            
            $_SESSION['id'] = $oagent->id;
            $_SESSION['nom'] = $oagent->nom;
            $_SESSION['prenom'] = $oagent->prenom;
            $_SESSION['login'] = $oagent->login;//nom de code de l'agent
            $_SESSION['nationalite'] = $oagent->nationalite;
            
            header('Location: Accueil-Agent.php');
        }
        else
            {
                $errorMsg = "Login ou Mot de passe incorrect";
            }
 ?>
<div class="container">
    <form class="form-horizontal" id="form" method="POST" action="<?= $formAction; ?>">
         <div class="login-box">
             <h1>Connectez-vous Agent !</h1>
            <div class="textbox">
                <i class="fa fa-user"></i>
              <input type="text" placeholder="Nom de Code" name="username" required>
            </div>
            <div class="textbox">
                <i class="fa fa-lock"></i>
              <input type="password" placeholder="Password" name="pwd" required>
            </div>
             <center><button type="submit" name="LogIn" class="btn btn-success">Se Connecter</button>
             <a href="./SeConnecter_admin.php" class="btn btn-danger">Client administrateur >></a></center>
         </div>
      </form>
</div>

