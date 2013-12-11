<?php $this->titre = "Consultation des compte-rendus"; ?>

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
            <?php
            if (isset($message))
                echo $message;
            ?>
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
                                    <a href="compterendus/modification/<?= $compteRendu['idCompteRendu'] ?>" class="btn btn-info" title="Modifier">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <button class="btn btn-danger" data-target="#dlgConfirmation<?= $compteRendu['idCompteRendu'] ?>" data-toggle="modal" title="Supprimer" type="button">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                    <!--                                
                                     Dialogue modal de confirmation de suppression                                     
                                    -->
                                    <!--                                   
                                     Doit être numéroté pour être associé à chaque CR                                    
                                    -->
                                    <div id="dlgConfirmation<?= $compteRendu['idCompteRendu'] ?>" class="modal fade" aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button class="close" aria-hidden="true" data-dismiss="modal" type="button">
                                                        ×
                                                    </button>
                                                    <h4 id="myModalLabel" class="modal-title">
                                                        Demande de confirmation
                                                    </h4>
                                                </div>
                                                <div class="modal-body">
                                                    Voulez-vous vraiment supprimer ce compte-rendu ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-default" data-dismiss="modal" type="button">
                                                        Annuler
                                                    </button>
                                                    <a class="btn btn-danger" href="compterendus/supprimer/<?= $compteRendu['idCompteRendu'] ?>">
                                                        Supprimer
                                                    </a>
                                                </div>
                                            </div>
                                            <!--                                  
                                             /.modal-content                                    
                                            --> 
                                        </div>
                                        <!--                                    
                                         /.modal-dialog                                    
                                        --> 
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>

