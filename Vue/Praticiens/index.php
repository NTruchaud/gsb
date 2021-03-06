<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Liste des praticiens</h2>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Type de praticien</th>
                    <th>Ville</th>
                </tr>
            </thead>
            <?php foreach ($praticiens as $praticien): ?>
                <tr>
                    <td><a href="praticiens/details/<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nom']) ?></a></td>
                    <td><?= $this->nettoyer($praticien['prenom']) ?></td>
                    <td><?= $this->nettoyer($praticien['libTypePraticien']) ?></td>
                    <td><?= $this->nettoyer($praticien['ville']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

