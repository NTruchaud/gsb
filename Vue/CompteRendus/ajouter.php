<?php $this->titre = "Compte-rendus"; ?>

<?php
$menuCompteRendu = true;
require_once 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Nouveau compte-rendu de visite</h2>
    <div class="well">
        <div class="alert alert-success">
            <?= $this->nettoyer($message) ?>
        </div>

    </div>
</div>