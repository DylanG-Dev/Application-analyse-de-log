<?php
session_start();

use BO\loueur;
use DAO\loueurDAO;

require_once("model/DAO/connexionMySQL.php");
require_once("model/DAO/loueurDAO.php");
require_once("model/DAO/logsDAO.php");
$dao = new loueurDAO();
$ldao = new LogsDAO();

$message_erreur = '';
$message_valider = '';
$logs = [];
$log = null;
$title = 'Connexion';
$vue = 'connexion';
$stats = null;
$loueur = null;


// Connexion
if(isset($_POST['btnConnexion'])) {
    if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['motdepasse'])) {
        $utilisateur = $dao->connecteUtilisateur($_POST['id'], $_POST['nom'], $_POST['motdepasse']);
        if($utilisateur) {
            $_SESSION['id'] = $_POST['id'];
            $_SESSION['loueur_nom'] = $_POST['nom'];
            $_SESSION['isAdmin'] = $utilisateur['isAdmin'];
            // Connexion Admin
            if($utilisateur['isAdmin']) {
                $vue = 'administrateurConnecte';
                $title = 'Administrateur';
            }
            // Connexion Utilisateur
            else {
                $vue = 'utilisateurConnecte'; 
                $title = 'Loueur Connecté';
            }
        } else {
            $message_erreur = 'Identifiants incorrects';
        }
    }
}

// Les pages utilisateur
if(isset($_GET['action']) && $_GET['action'] == 'utilisateurConnecte') {
    $vue = 'utilisateurConnecte';
    $title = 'Loueur Connecté';
}

if(isset($_GET['action']) && $_GET['action'] == 'administrateurConnecte') {
    $vue = 'administrateurConnecte';
    $title = 'Administrateur Connecté';
}

if(isset($_GET['action']) && $_GET['action'] == 'mesStats') {
    $vue = 'mesStats';
    $title = 'Mes Statistiques';
    if(isset($_SESSION['id'])) {
        $stats = $dao->statsLoueur($_SESSION['id']);
    } else {
        $message_erreur = 'Vous devez être connecté pour accéder à cette page';
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'mesInfos') {
    $vue = 'mesInfos';
    $title = 'Mes Informations';
    if(isset($_SESSION['id'])) {
        $loueur = $dao->findById($_SESSION['id']);
    } else {
        $message_erreur = 'Vous devez être connecté pour accéder à cette page';
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'derniereStatsLoueur') {
    $vue = 'derniereStatsLoueur';
    $title = 'Dernières Statistiques';
    if(isset($_SESSION['id'])) {
        $log = $dao->derniereStatsLoueur($_SESSION['id']);
    } else {
        $message_erreur = 'Vous devez être connecté pour accéder à cette page';
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'historiqueLoueur') {
    $vue = 'historiqueLoueur';
    $title = 'Historique Loueur';
    if(isset($_SESSION['id'])) {
        $logs = $dao->historiqueLoueur($_SESSION['id']);
    } else {
        $message_erreur = 'Vous devez être connecté pour accéder à cette page';
    }
}

// Les pages administrateur
if (isset($_GET['lesStats'] )) {
    $vue = 'lesStats';
}

if (isset($_GET['historiqueAdmin'] )) {
    $vue = 'historiqueAdmin';
    $dao = new LoueurDAO();
    $logs = $ldao->getHistoriqueAdmin();
    if(isset($_POST['btnChercher']) && $_POST['date'] != "") {
        $logs = $ldao->getHistoriqueAdminByDate($_POST['date']);
    }
}

if (isset($_GET['derniereStatsAdmin'])) {
    $vue = 'derniereStatsAdmin';
    $dao = new LoueurDAO();
    $logs = $ldao->getLastDate();

    if (!is_array($logs)) {
        $logs = []; // Sécurité si la méthode échoue
    }
}

if (isset($_GET['statsParLoueur'])) {
    $vue = 'statsParLoueur';
    $dao = new LoueurDAO();
    $logs = [];

    if (isset($_POST['btnRecherche']) && !empty($_POST['id']) && !empty($_POST['date'])) {
        $log = $ldao->getByLoueurByDate($_POST['id'],$_POST['date']);
        if (is_array($log)) {
            $logs = $log;
        }
    }
}

if (isset($_GET['administration'])) {
    $vue = 'administration';
}

if (isset($_GET['creerLoueur'])) {
    $vue = 'creerLoueur';
    $dao = new LoueurDAO();
    if(isset($_POST['btnValider'])) {
        if (isset($_POST['nom']) && isset($_POST['motdepasse']) && isset($_POST['id']) && isset($_POST['pays']) && isset($_POST['email']) && isset($_POST['numTel'])) {

                $date = new DateTime();
                $loueur = new Loueur($_POST['id'], $_POST['nom'],$_POST['motdepasse'], $_POST['pays'], $_POST['email'], $_POST['numTel']);
                $dao->create($loueur);
                $message_valider = 'Loueur ' . $_POST['nom'] . ' créé';
        } else {
            $message_erreur = 'Vous devez remplir les champs obligatoires';
        }
    }
}

if (isset($_GET['modifierLoueur'])) {
    $vue = 'modifierLoueur';
    $dao = new LoueurDAO();
    if(isset($_POST['btnConnexion'])){
        if($_POST['id'] == TRUE ){
            if($_POST['nouveauNom'] != '' && $_POST['motdepasse'] != '' && $_POST['pays'] != '' && $_POST['email'] != '' && $_POST['numTel'] != ''){
                $date = new DateTime();
                $loueur = new Loueur($_POST['id'], $_POST['nouveauNom'], $_POST['motdepasse'], $_POST['pays'], $_POST['email'], $_POST['numTel']);
                $dao->update($loueur);
                $message_valider = 'Loueur '. $_POST['nouveauNom'].' modifié';
            }
            else{
                $message_valider = 'Vous devez remplir tous les champs';
            }
        }
        else{
            $message_valider = 'vous devez entrer un id';
        }
    }


}


if (isset($_GET['supprimerLoueur'])) {
    $vue = 'supprimerLoueur';
    $dao = new LoueurDAO();
    if(isset($_POST['btnValider'])){
        if ($_POST['id'] != ''){
            $dao->delete($_POST['id']);
            $message_valider = 'Loueur '. $_POST['id'].' supprimé';
        }
        else{
            $message_valider = 'vous devez entrer un nom';
        }
    }
}


// Déconnexion
if(isset($_GET['deco'])){
    session_unset();
    session_destroy();
    $vue = 'connexion';
}

// Inclusion des vues
include 'view/header.php';

if($vue == 'connexion') {
    include 'view/connexion.php';
} else if($vue == 'utilisateurConnecte') {
    include 'view/loueurConnecte.php';
} else if($vue == 'administrateurConnecte') {
    include 'view/administrateurConnecte.php';
} else if($vue == 'mesStats') {
    include 'view/mesStats.php';
} else if($vue == 'mesInfos') {
    include 'view/mesInformations.php';
} else if($vue == 'derniereStatsLoueur') {
    include 'view/derniereStatsLoueur.php';
} else if($vue == 'historiqueLoueur') {
    include 'view/historiqueLoueur.php';
} else if($vue == 'lesStats') {
    include 'view/LesStats.php';
} else if($vue == 'historiqueAdmin') {
    include 'view/historiqueAdmin.php';
} else if($vue == 'derniereStatsAdmin') {
    include 'view/derniereStatsAdmin.php';
} else if($vue == 'statsParLoueur') {
    include 'view/statsParLoueur.php';
} else if($vue == 'administration') {
    include 'view/administration.php';
} else if($vue == 'creerLoueur') {
    include 'view/creationLoueur.php';
} else if($vue == 'modifierLoueur') {
    include 'view/modifLoueur.php';
} else if($vue == 'supprimerLoueur') {
    include 'view/supprLoueur.php';
} else {
    echo "<p>Action non reconnue.</p>";
}

include 'view/footer.php';