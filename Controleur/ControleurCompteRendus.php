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
        $praticiens = $this->praticien->getPraticiens();
        
        $compteRendus = $this->compteRendu->setCompteRendu();
        $this->genererVue(array('praticiens' => $praticiens, 'compteRendus' => $compteRendus, ));
    }

}

?>