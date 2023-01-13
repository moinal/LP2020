<?php
// Ce fichier est le point d'entrée de votre application

    require 'Core/AutoLoad.php';
    /*
     url pour notre premier test MVC Hello World,
     nous n'avons pas d'action précisée on visera celle par défaut
     /index.php?ctrl=helloworld
     /helloworld
     /controleur/nom_action/whatever/whatever2/

    */
/*
    $S_controleur = isset($_GET['ctrl']) ? $_GET['ctrl'] : null;
    $S_action = isset($_GET['action']) ? $_GET['action'] : null;

    View::ouvrirTampon(); //  /Core/View.php : on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans
    $O_controleur = new Controller($S_controleur, $S_action);
*/

    $S_urlToPeer = isset($_GET['url']) ? $_GET['url'] : null;
    $A_postParams = isset($_POST) ? $_POST : null;

    View::openBuffer(); // on ouvre le tampon d'affichage, les contrôleurs qui appellent des vues les mettront dedans

    try
    {
        $O_controller = new Controller($S_urlToPeer, $A_postParams);
        $O_controller->execute();
    }
    catch (ControllerException $O_exception)
    {
        echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
    }


    // Les différentes sous-vues ont été "crachées" dans le tampon d'affichage, on les récupère
    $contentForDisplay = View::getBufferContent();

    // On affiche le contenu dans la partie body du gabarit général
    View::show('gabarit', array('body' => $contentForDisplay));