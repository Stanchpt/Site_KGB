<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

$login=$_SESSION['login'];

?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="../Accueil-Agent.php">KGB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="./LesMissions.php">Les Missions</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link"> Bienvenue sur notre site <?php echo $login.'!' ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="./include/deconnexion.php">
        Se deconnecter <i class="fa fa-sign-out" aria-hidden="true"></i> 
      </a>
    </li>
  </ul>
</nav>
