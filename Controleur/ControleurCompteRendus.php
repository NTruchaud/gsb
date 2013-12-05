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
            $compteRendus = $this->compteRendu->setCompteRendu($this->requete->getParametre('idPraticien'), $idVisiteur, $this->requete->getParametre('dateRapport'),
                    $this->requete->getParametre('bilan'), $this->requete->getParametre('motif'));
        }
        else
            throw new Exception("Le compte rendu n'a pas pu etre ajouté");
        $this->genererVue(array('praticiens' => $praticiens, 'compteRendus' => $compteRendus, 'message' => $message));
    }
    
    public function consulter()
    {
        $compteRendus = $this->compteRendu->consultCompteRendu();
        $this->genererVue(array('compteRendus' => $compteRendus));
    }

}

