<?php

class Model{
    private static function initConnection(){
        return Connection::connect("mel.db.elephantsql.com","betwmtzu","e-XKrb3aY50rWfRQele2Z_17ieTeY3e1");
    }

    public static function selectById($id){
        $db = self::initConnection();
        $stmnt = "SELECT * FROM ".get_called_class()." WHERE ID = :id";
        $sth = $db->prepare($stmnt);
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        $sth->execute();
        $row = $sth->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public static function deleteByID($id){
        $db = self::initConnection();
        $stmnt = "DELETE * FROM ".get_called_class()." WHERE ID = :id";
        $sth = $db->prepare($stmnt);
        $sth->bindValue(':id', $id, PDO::PARAM_STR);
        return $sth->execute();
    }

    public static function create($A_postParams){
        $db = self::initConnection();

        $keys = "(";
        $vals = "(";
        foreach (array_keys($A_postParams) as &$key){
            $keys.$key.",";
            $vals."?,";
        }
        $key[-1] = ")";
        $vals[-1] = ")";


        $stmnt = "INSERT INTO ".get_called_class()." ".$keys." VALUES ".$vals;
        $sth = $db->prepare($stmnt);
        echo $stmnt;
        return $sth->execute(array_values($A_postParams));
    }

    public static function updateByID($A_postParams,$id){
        $db = self::initConnection();

        $keys = "";
        foreach (array_keys($A_postParams) as &$key){
            " ".$keys.$key."=".$A_postParams[$key]." ,";
        }
        $key[-1] = " ";


        $stmnt = "UPDATE ".get_called_class()." SET ".$keys." WHERE ID =".$id;
        $sth = $db->prepare($stmnt);
        return $sth->execute(array_values($A_postParams));
    }
}