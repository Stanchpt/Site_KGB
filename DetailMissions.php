<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<html>
    <head>

            <?php 
                require_once 'include/head.php';
                require_once 'include/navbar-agent.php';
                
                    $login=$_SESSION['login'];
                    $nationalite=$_SESSION['nationalite'];
            ?>
    </head>
    <body>
        <?php
            require_once 'include/form_detailmission.php';
        ?>
    </body>
</html>
