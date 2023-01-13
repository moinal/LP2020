<?php

final class Connection{


    public static function test(){
        echo 'glop';


    }
    public static function connect($host,$user,$password){
        try
        {
            $bdd = new PDO("
                pgsql:host=$host; port=5432; 
                dbname=$user; 
                user=$user; 
                password=$password"
            );
            return $bdd;
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }

}