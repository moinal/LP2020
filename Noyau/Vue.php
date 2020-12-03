<?php

final class Vue
{
    public static function ouvrirTampon()
    {
        // On démarre le tampon de sortie, on va l'appeler "tampon principal"
        ob_start();
    }

    public static function recupererContenuTampon()
    {
        // On retourne le contenu du tampon principal
        return ob_get_clean();
    }

    public static function montrer ($S_localisation, $A_parametres = array())
    {
        $S_fichier = Constantes::repertoireVues() . $S_localisation . '.php';

            $A_vue = $A_parametres;
            // Démarrage d'un sous-tampon
            ob_start();
            include $S_fichier; // c'est dans ce fichier que sera utilisé A_vue, la vue est inclue dans le sous-tampon
            ob_end_flush();
    }
}