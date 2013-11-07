<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center"><?= $this->nettoyer($praticien['nom']) ?> <?= $this->nettoyer($praticien['prenom']) ?></h2>
    <div class="well">
        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-sm-3 control-label">Type praticien</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['libTypePraticien']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Adresse praticien</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['adresse']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Code postal</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['cp']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Ville</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['ville']) ?></p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Coef. Notoriété</label>
                <div class="col-sm-9">
                    <p class="form-control-static"><?= $this->nettoyer($praticien['notoriete']) ?></p>
                </div>
            </div>

        </form>
    </div>    
</div>

