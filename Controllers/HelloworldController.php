<?php

final class HelloworldController
{
    public function defaultAction()
    {
        $O_helloworld =  new Helloworld();
        View::show('helloworld/voir', array('helloworld' =>  $O_helloworld->donneMessage()));

    }

    public function testformAction(Array $A_parametres = null, Array $A_postParams = null)
    {

        View::show('helloworld/testform', array('formData' =>  $A_postParams));

    }

}