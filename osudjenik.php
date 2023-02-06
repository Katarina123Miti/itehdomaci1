<?php

class Osudjenik {

    public $id;   
    public $imePrezime;   
    public $sudija;   

    public function __construct($id=null, $imePrezime=null, $sudija=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
        $this->sudija = $sudija;
    }

    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT o.*, s.imePrezime as sudija_imePrezime, count(kd.id) as broj_krivicnih_dela FROM osudjenik o 
        INNER JOIN sudija s on (o.sudija=s.id) LEFT JOIN krivicnodelo kd on (o.id=kd.osudjenik) GROUP BY o.id ORDER BY o.id";
        return $broker->executeQuery($query);
    }

    public static function getById($id,DBBroker $broker){
        $query = "SELECT * FROM osudjenik WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(DBBroker $broker)
    {
        $query = "DELETE FROM osudjenik WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    # ili da zovemo nad objektom koji menjamo a prosledjujemo id
    public function update(Osudjenik $osudjenik,DBBroker $broker)
    {
        $query = "UPDATE osudjenik set imePrezime = '$osudjenik->imePrezime',sudija = $osudjenik->sudija WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(Osudjenik $osudjenik,DBBroker $broker)
    {
        $query = "INSERT INTO osudjenik(imePrezime, sudija) VALUES('$osudjenik->imePrezime','$osudjenik->sudija')";
        return $broker->executeQuery($query);
    }
}

?>