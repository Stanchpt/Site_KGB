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
    <body id="login-form-admin">
        <div class="container">
            <?php
                $formAction="seConnecter_admin.php";
                require_once 'include/form_admin.php';
            ?>
        </div>
    </body>
</html>