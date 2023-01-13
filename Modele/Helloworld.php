<?php

final class Helloworld
{
    private $_S_message = "Hello World";

    public function donneMessage()
    {
        return $this->_S_message ;
    }
    public function create(Array $A_postParams = null)
    {
        Model::create($A_postParams);
        return $this->_S_message ;
    }
}