<?php

use Outils\Utilitaires;

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
switch ($action) {
    case 'listeVisiteur':
        $idVisiteur = $pdo->getIdVisiteur();
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        include PATH_VIEWS . 'v_listeVisiteur.php';
        break;
    case 'moisVisiteur':
        $idVisiteur = $pdo->getIdVisiteur();
        $lesMois = $pdo->getLesMoisDisponibles($idVisiteur[1]);
        // Afin de sélectionner par défaut le dernier mois dans la zone de liste
        // on demande toutes les clés, et on prend la première,
        // les mois étant triés décroissants
        $lesCles = array_keys($lesMois);
        $moisASelectionner = $lesCles[0];
        include PATH_VIEWS . 'v_listeVisiteur.php';
        break;
}

