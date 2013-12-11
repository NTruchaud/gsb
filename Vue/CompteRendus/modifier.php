<?php $this->titre = "Modification des compte-rendus"; ?>

<?php
$menuCompteRendu = true;
require_once 'Vue/_Commun/navigation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">
                Modification d'un compte-rendu de visite
            </h2>
            <div class="well">
                <div class="alert alert-success">
                    <?= $this->nettoyer($message) ?>
                </div>
            </div>
        </div>
    </body>
</html>
