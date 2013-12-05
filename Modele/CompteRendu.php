<?php

require_once "Framework/Modele.php";
require_once 'Framework/Session.php';

class CompteRendu extends Modele {

    private $sqlCompteRendu = 'INSERT INTO rapport_visite (id_praticien, id_visiteur, date_rapport, bilan, motif) VALUES(?, ?, ?, ?, ?)';

    public function setCompteRendu($idPraticien, $idVisiteur, $dateRapport, $bilan, $motif) {
            $sql = $this->sqlCompteRendu;
            $compteRendu = $this->executerRequete($sql, array($idPraticien, $idVisiteur, $dateRapport, $bilan, $motif));
    }
    
    public function consultCompteRendu()
    {
        $sql = 'SELECT CR.date_rapport as date, PR.nom_praticien as nom, PR.ville_praticien as ville, 
            CR.motif as motif FROM rapport_visite CR JOIN praticien PR ON CR.id_praticien = PR.id_praticien';
        $compteRendus = $this->executerRequete($sql);
            return $compteRendus;
    }

}

?>
