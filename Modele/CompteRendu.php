<?php

require_once "Framework/Modele.php";
require_once 'Framework/Session.php';

class CompteRendu extends Modele {

    private $sqlCompteRendu = 'INSERT INTO rapport_visite VALUES("", ?, ?, ?, ?, ?)';

    public function setCompteRendu() {
        try {
            $sql = $this->sqlCompteRendu;
            $compteRendu = $this->executerRequete($sql);
        } catch (Exception $e) {
            throw new Exception("Le compte-rendu n'a pas pu être ajouté.");
        }
    }
}

?>
