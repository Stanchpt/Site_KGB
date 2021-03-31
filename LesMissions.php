

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
            require_once 'include/form_missions.php';
        ?>
    </body>
</html>