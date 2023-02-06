<?php

require "../DBBroker.php";
require "../osudjenik.php";

$broker=DBBroker::getBroker();

if(isset($_POST['imePrezime']) && isset($_POST['sudija'])) {

    $osudjenik = new Osudjenik(1,$_POST['imePrezime'],$_POST['sudija']);
    $rezultat = Osudjenik::add($osudjenik, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
    }else{ 
        echo '1';
    }
}


?>