<?php

require_once 'Framework/Controleur.php';


abstract class ControleurSecurise extends Controleur
{

    public function executerAction($action)
    {
        // Vérifie si les informations utilisateur sont présents dans la session
        // Si oui, l'utilisateur s'est déjà authentifié : l'exécution de l'action continue normalement
        // Si non, l'utilisateur est renvoyé vers le contrôleur de connexion
        if ($this->requete->getSession()->existeAttribut("idVisiteur")) {
            parent::executerAction($action);
        }
        else {
            $this->rediriger("connexion");
        }
    }

    public function connecter()
    {
        if ($this->requete->existeParametre("login") && $this->requete->existeParametre("mdp")) {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if ($this->visiteur->connecter($login, $mdp)) {
                $visiteur = $this->visiteur->getVisiteur($login, $mdp);
                $this->requete->getSession()->setAttribut("idVisiteur",
                        $visiteur['idVisiteur']);
                $this->requete->getSession()->setAttribut("login",
                        $visiteur['login']);
                $this->rediriger("accueil");
            }
            else
                $this->genererVue(array('msgErreur' => 'Login ou mot de passe incorrects'),
                        "index");
        }
        else
            throw new Exception("Action impossible : login ou mot de passe non défini");
    }
}
