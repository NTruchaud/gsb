<?php

require_once 'Modele/Praticien.php';
require_once 'Modele/CompteRendu.php';
require_once 'ControleurSecurise.php';

class ControleurCompteRendus extends ControleurSecurise {

    private $compteRendu;
    private $praticien;

    public function __construct() {
        $this->compteRendu = new CompteRendu();
        $this->praticien = new Praticien();
    }

    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    public function ajouter() {
        if ($this->requete->existeParametre('idPraticien') && $this->requete->existeParametre('dateRapport') && $this->requete->existeParametre('bilan') &&
                $this->requete->existeParametre('motif')) {
            $message = 'Le compte-rendu a bien été ajouté';
            $praticiens = $this->praticien->getPraticiens();
            $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur");
            $compteRendus = $this->compteRendu->setCompteRendu($this->requete->getParametre('idPraticien'), $idVisiteur, $this->requete->getParametre('dateRapport'), $this->requete->getParametre('bilan'), $this->requete->getParametre('motif'));
        }
        else
            throw new Exception("Le compte rendu n'a pas pu être ajouté");
        $this->genererVue(array('praticiens' => $praticiens, 'compteRendus' => $compteRendus, 'message' => $message));
    }

    public function consulter() {
        $compteRendus = $this->compteRendu->consultCompteRendu();
        $this->genererVue(array('compteRendus' => $compteRendus));
    }

    public function supprimer() {
        if ($this->requete->existeParametre('id')) {
            $idRapport = $this->requete->getParametre("id");
            $supprCR = $this->compteRendu->supprimerCompteRendu($idRapport);
            $compteRendus = $this->compteRendu->consultCompteRendu();
        }
        else
            throw new Exception('La suppression n\'a pas pu être effectuée');
        $this->genererVue(array('compteRendus' => $compteRendus), "consulter");
    }

    public function modification() {
        if ($this->requete->existeParametre("id")) {
            $idRapport = $this->requete->getParametre("id");
            $modification = $this->compteRendu->afficheModif($idRapport);
            $this->genererVue(array('modifCR' => $modification));
        }
        else
            throw new Exception('Le compte rendu' . $idRapport . 'n\'existe pas');
    }

    public function modifier() {
        if ($this->requete->existeParametre("idCR")) {
            $idRapport = $this->requete->getParametre("idCR");
            $motif = $this->requete->getParametre("motif");
            $bilan = $this->requete->getParametre("bilan");
            $modifCompteRendu = $this->compteRendu->updateCompteRendu($idRapport, $bilan, $motif);
            $compteRendus = $this->compteRendu->consultCompteRendu();
            $message = 'Le modification a bien été effectuée !';
            $this->genererVue(array('compteRendus' => $compteRendus, 'message' => $message));
        }
        else
            throw new Exception("La modification n'a pas pu être effectuée.");
    }

}

