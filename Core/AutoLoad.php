<?php

require 'Core/Constants.php';

final class AutoLoad
{
    public static function loadCoreClasses ($S_className)
    {
        $S_file = Constants::coreDirectory() . "$S_className.php";
        return static::_load($S_file);
    }

    public static function loadExceptionClasses ($S_className)
    {
        $S_file = Constants::exceptionsDirectory() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadModelClasses ($S_className)
    {
        $S_file = Constants::modelDirectory() . "$S_className.php";

        return static::_load($S_file);
    }


    public static function loadViewClasses ($S_className)
    {
        $S_file = Constants::viewsDirectory() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadControllerClass ($S_className)
    {
        $S_file = Constants::controllersDirectory() . "$S_className.php";

        return static::_load($S_file);
    }
    private static function _load ($S_fileToLoad)
    {
        if (is_readable($S_fileToLoad))
        {
            require $S_fileToLoad;
        }
    }
}

// J'empile tout ce beau monde comme j'ai toujours appris à le faire...
spl_autoload_register('AutoLoad::loadCoreClasses');
spl_autoload_register('AutoLoad::loadExceptionClasses');
spl_autoload_register('AutoLoad::loadModelClasses');
spl_autoload_register('AutoLoad::loadViewClasses');
spl_autoload_register('AutoLoad::loadControllerClass');
