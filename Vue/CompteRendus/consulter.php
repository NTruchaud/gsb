<?php $this->titre = "Consultation des c    ompte-rendus"; ?>

<?php
$menuCompteRendu = true;
require 'Vue/_Commun/navigation.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
            <?php if(isset($message))
                echo $message;?>
            <h2 class="text-center">Liste de vos comptes-rendus de visite</h2>
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Praticien</th>
                            <th>Ville</th>
                            <th>Motif</th>
                            <th></th>  <!-- Colonne des boutons d'action -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($compteRendus as $compteRendu): ?>
                        <tr>
                            <td class="vert-align"><?= $compteRendu['date'] ?></td>
                            <td class="vert-align"><?= $compteRendu['nom'] ?></td>
                            <td class="vert-align"><?= $compteRendu['ville'] ?></td>
                            <td class="vert-align"><?= $compteRendu['motif'] ?></td>
                            <td>
                                <a href="comptesrendus/modification/<?= $compteRendu['idCompteRendu'] ?>" class="btn btn-info" title="Modifier">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <button type="button"class="btn btn-danger" title="Supprimer" data-toggle="modal" data-target="#dlgConfirmation<?= $compteRendu['idCompteRendu'] ?>">
                                    <span class="glyphicon glyphicon-remove"></span>
                                </button>
                                <!-- Dialogue modal de confirmation de suppression -->
                                <!-- Doit être numéroté pour être associé à chaque CR -->
                                <div class="modal fade" id="dlgConfirmation<?= $compteRendu['idCompteRendu'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="myModalLabel">Demande de confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer ce compte-rendu ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="comptesrendus/supprimer/<?= $compteRendu['idCompteRendu'] ?>" class="btn btn-danger">Supprimer</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

