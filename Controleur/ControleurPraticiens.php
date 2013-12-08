<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'ControleurSecurise.php';

// Contrôleur des actions liées aux médicaments
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle Médicament
    private $praticien;

    public function __construct() {
        $this->praticien = new Praticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens, 'typePraticien' => $typePraticien));
    }

    // Affiche les informations détaillées sur un praticien
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun médicament défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $typesPraticiens = $this->praticien->getTypesPraticiens();
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens, 'typesPraticiens' => $typesPraticiens));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    public function resultats() {
        if ($this->requete->existeParametre("idType") || $this->requete->existeParametre("nom") || $this->requete->existeParametre("ville")) {
            $idTypePraticien = $this->requete->getParametre("idType");
            $nomPraticien = $this->requete->getParametre("nom");
            $villePraticien = $this->requete->getParametre("ville");
            
            $this->afficherA($idTypePraticien, $nomPraticien, $villePraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    private function afficherA($idTypePraticien, $nom, $ville)
    {
        $praticiens = $this->praticien->getPraticienAvancé($nom, $ville, $idTypePraticien);
        $this->genererVue(array('praticiens' => $praticiens), "avancee");
    }
    
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }

}