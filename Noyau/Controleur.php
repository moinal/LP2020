<?php

final class Controleur
{
    private $_A_urlDecortique;

    private $_A_urlParametres;

    private $_A_postParams;

    public function __construct ($S_url, $A_postParams)
    {
        // On élimine l'éventuel slash en fin d'URL sinon notre explode renverra une dernière entrée vide
        if ('/' == substr($S_url, -1, 1)) {
            $S_url = substr($S_url, 0, strlen($S_url) - 1);
        }

        // On éclate l'URL, elle va prendre place dans un tableau
        $A_urlDecortique = explode('/', $S_url);

        if (empty($A_urlDecortique[0])) {
            // Nous avons pris le parti de préfixer tous les controleurs par "Controleur"
            $A_urlDecortique[0] = 'ControleurDefaut';
        } else {
            $A_urlDecortique[0] = 'Controleur' . ucfirst($A_urlDecortique[0]);
        }

        if (empty($A_urlDecortique[1])) {
            // L'action est vide ! On la valorise par défaut
            $A_urlDecortique[1] = 'defautAction';
        } else {
            // On part du principe que toutes nos actions sont suffixées par 'Action'...à nous de le rajouter
            $A_urlDecortique[1] = $A_urlDecortique[1] . 'Action';
        }


        // on dépile 2 fois de suite depuis le début, c'est à dire qu'on enlève de notre tableau le contrôleur et l'action
        // il ne reste donc que les éventuels parametres (si nous en avons)...
        $this->_A_urlDecortique['controleur'] = array_shift($A_urlDecortique); // on recupere le contrôleur
        $this->_A_urlDecortique['action']     = array_shift($A_urlDecortique); // puis l'action

        // ...on stocke ces éventuels parametres dans la variable d'instance qui leur est réservée
        $this->_A_urlParametres = $A_urlDecortique;

        // On  s'occupe du tableau $A_postParams
        $this->_A_postParams = $A_postParams;


    }

    // On exécute notre triplet

    public function executer()
    {
        if (!class_exists($this->_A_urlDecortique['controleur'])) {
            throw new ControleurException($this->_A_urlDecortique['controleur'] . " n'est pas un controleur valide.");
        }

        if (!method_exists($this->_A_urlDecortique['controleur'], $this->_A_urlDecortique['action'])) {
            throw new ControleurException($this->_A_urlDecortique['action'] . " du contrôleur " .
                $this->_A_urlDecortique['controleur'] . " n'est pas une action valide.");
        }

        $B_called = call_user_func_array(array(new $this->_A_urlDecortique['controleur'],
            $this->_A_urlDecortique['action']), array($this->_A_urlParametres, $this->_A_postParams ));

        if (false === $B_called) {
            throw new ControleurException("L'action " . $this->_A_urlDecortique['action'] .
                " du contrôleur " . $this->_A_urlDecortique['controleur'] . " a rencontré une erreur.");
        }
    }
}