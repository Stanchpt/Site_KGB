<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
       <?php
            require_once 'include/head.php';
       ?>
    </head>
    <body id="login-form">
        <div class="container">
            <?php
                $formAction="seConnecter.php";
                require_once 'include/form_login.php';
            ?>
            <br>
            <br>
            <?php
                require_once 'include/gestion-erreur.php';
            ?>
        </div>
    </body>
</html>
