<?php

class Sudija{

    public $id;   
    public $imePrezime;   

    public function __construct($id=null, $imePrezime=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
    }

    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT * FROM sudija";
        return $broker->executeQuery($query);
    }

    public static function getById($id,DBBroker $broker)
    {
        $query = "SELECT * FROM sudija WHERE id=$id";
        return $broker->executeQuery($query);
    }
}

?>