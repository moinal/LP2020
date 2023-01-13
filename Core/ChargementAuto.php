<?php

require 'Core/Constants.php';

final class ChargementAuto
{
    public static function chargerClassesNoyau ($S_nomDeClasse)
    {
        $S_fichier = Constants::coreDirectory() . "$S_nomDeClasse.php";
        return static::_charger($S_fichier);
    }

    public static function chargerClassesException ($S_nomDeClasse)
    {
        $S_fichier = Constants::exceptionsDirectory() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesModele ($S_nomDeClasse)
    {
        $S_fichier = Constants::modelDirectory() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }


    public static function chargerClassesVue ($S_nomDeClasse)
    {
        $S_fichier = Constants::viewsDirectory() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }

    public static function chargerClassesControleur ($S_nomDeClasse)
    {
        $S_fichier = Constants::controllersDirectory() . "$S_nomDeClasse.php";

        return static::_charger($S_fichier);
    }
    private static function _charger ($S_fichierACharger)
    {
        if (is_readable($S_fichierACharger))
        {
            require $S_fichierACharger;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('ChargementAuto::chargerClassesNoyau');
spl_autoload_register('ChargementAuto::chargerClassesException');
spl_autoload_register('ChargementAuto::chargerClassesModele');
spl_autoload_register('ChargementAuto::chargerClassesVue');
spl_autoload_register('ChargementAuto::chargerClassesControleur');
