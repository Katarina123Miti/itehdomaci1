<?php
class KrivicnoDelo {

    public $id;   
    public $osudjenik;   
    public $datum;   
    public $nazivDela;

    public function __construct($id=null, $osudjenik=null,  $nazivDela=null, $datum=null)
    {
        $this->id = $id;
        $this->osudjenik = $osudjenik;
        $this->nazivDela = $nazivDela;
        $this->datum = $datum;
    }


    public static function getAll(DBBroker $broker)
    {
        $query = "SELECT kd.*, o.imePrezime as osudjenik_imePrezime FROM krivicnodelo kd INNER JOIN osudjenik o on (kd.osudjenik=o.id)";
        return $broker->executeQuery($query);
    }

    public static function getById($id,Broker $broker){
        $query = "SELECT * FROM krivicnodelo WHERE id=$id";
        return $broker->executeQuery($query);
    }

    public static function getAllByOsudjenik($id,DBBroker $broker){
        $query = "SELECT * FROM krivicnodelo WHERE osudjenik=$id";
        return $broker->executeQuery($query);
    }

    public function deleteById(DBBroker $broker)
    {
        $query = "DELETE FROM krivicnodelo WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public function update(KrivicnoDelo $krivicnodelo, DBBroker $broker)
    {
        $query = "UPDATE krivicnodelo set osudjenik = $krivicnodelo->osudjenik,nazivDela = '$krivicnodelo->nazivDela',datum = '$krivicnodelo->datum' WHERE id=$this->id";
        return $broker->executeQuery($query);
    }

    public static function add(KrivicnoDelo $krivicnodelo, DBBroker $broker)
    {
        $query = "INSERT INTO krivicnodelo(osudjenik, nazivDela, datum) VALUES('$krivicnodelo->osudjenik','$krivicnodelo->nazivDela','$krivicnodelo->datum')";
        return $broker->executeQuery($query);
    }
}
?>