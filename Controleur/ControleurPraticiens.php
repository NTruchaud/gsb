<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';

// Contrôleur des actions liées aux médicaments
class ControleurPraticiens extends Controleur {

    // Objet modèle Médicament
    private $praticien;

    public function __construct() {
        $this->praticien = new Praticien();
    }

    // Affiche la liste des médicaments
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche les informations détaillées sur un médicament
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun médicament défini");
    }

    // Affiche l'interface de recherche de médicament
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche le résultat de la recherche de médicament
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun médicament défini");
    }
    
    // Affiche les détails sur un médicament
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

}