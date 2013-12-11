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
                <form class="form-horizontal" method="post" action="compterendus/modifier/" role="form">
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">
                            Date
                        </label>
                        <div class="col-sm-7">
                            <p class="form-control-static">
                                <?= $this->nettoyer($modifCR['date']) ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">
                            Praticien
                        </label>
                        <div class="col-sm-7">
                            <p class="form-control-static">
                                <?= $this->nettoyer($modifCR['nom']) ?> <?= $this->nettoyer($modifCR['prenom']) ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">
                            Motif
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <textarea class="form-control" autofocus="" required="" rows="2" name="motif"><?= $this->nettoyer($modifCR['motif']) ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-sm-offset-2 control-label">
                            Bilan
                        </label>
                        <div class="col-sm-5 col-md-4">
                            <textarea class="form-control" required="" rows="4" name="bilan"><?= $this->nettoyer($modifCR['bilan']) ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-5">
                            <button class="btn btn-default btn-primary" type="submit">
                                <span class="glyphicon glyphicon-edit"></span>
                                Mettre à jour
                            </button>
                        </div>
                    </div>
                    <input type="hidden" value="<?= $modifCR['idCompteRendu'] ?>" name="idCR"></input>
                </form>
            </div>
        </div>
    </body>
</html>
