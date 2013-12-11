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
        $sql = 'SELECT CR.id_rapport as idCompteRendu, CR.date_rapport as date, PR.nom_praticien as nom, PR.ville_praticien as ville, 
            CR.motif as motif FROM rapport_visite CR JOIN praticien PR ON CR.id_praticien = PR.id_praticien';
        $compteRendus = $this->executerRequete($sql);
            return $compteRendus;
    }
    
    public function supprimerCompteRendu($idRapport)
    {
        $sql = 'DELETE FROM rapport_visite WHERE id_rapport = ?';
        $supprCR = $this->executerRequete($sql, array($idRapport));
    }
    
    public function  updateCompteRendu($idRapport, $bilan, $motif)
    {
        $sql = 'UPDATE rapport_visite SET bilan = ?, motif = ? WHERE id_rapport = ?';
        $updateCR = $this->executerRequete($sql, array($bilan, $motif, $idRapport));
    }

}

?>
