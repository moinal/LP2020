<?php
// Ce fichier est le point d'entrée de votre application

    require 'Noyau/ChargementAuto.php';
    /*
     url pour notre premier test MVC Hello World,
     nous n'avons pas d'action précisée on visera celle par défaut
     index.php?ctrl=helloworld
    */
    $S_controleur = isset($_GET['ctrl']) ? $_GET['ctrl'] : null;
    $S_action = isset($_GET['action']) ? $_GET['action'] : null;

    Vue::ouvrirTampon(); //  /Noyau/Vue.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    $O_controleur = new Controleur($S_controleur, $S_action);
    $O_controleur->executer();

    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    $contenuPourAffichage = Vue::recupererContenuTampon();

    // On affiche le contenu dans la partie body du gabarit général
    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));