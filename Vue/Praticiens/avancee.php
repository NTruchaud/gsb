<?php $this->titre = "Résultat de la recherche"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Résultat de la recherche</title>
    </head>
    <body>
        <div class="container">
            <h2 class="text-center">
                Liste des praticiens trouvés
            </h2>
            <div class="table-responsive">
                <table class="table table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>
                                Nom
                            </th>
                            <th>
                                Prénom
                            </th>
                            <th>
                                Ville
                            </th>
                            <th>
                                Type
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($praticiens as $praticien) : ?>
                            <tr>
                                <td>
                                    <a href="praticiens/details/<?= $praticien['idTypePraticien'] ?>">
                                        <?= $praticien['nom'] ?>
                                    </a>
                                </td>
                                <td>
                                    <?= $praticien['prenom'] ?>
                                </td>
                                <td>
                                    <?= $praticien['ville'] ?>
                                </td>
                                <td>
                                    <?= $praticien['libTypePraticien'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
