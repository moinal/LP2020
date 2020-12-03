<?php

final class ControleurHelloworld
{
    public function defautAction()
    {
        $S_helloworld =  new Helloworld();

        Vue::montrer('helloworld/voir', array('helloworld' =>  $S_helloworld->donneMessage()));

    }

}