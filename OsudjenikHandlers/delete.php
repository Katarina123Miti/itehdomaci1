<?php

require "../DBBroker.php";
require "../osudjenik.php";

$broker=DBBroker::getBroker();

if(isset($_POST['id'])){
    $osudjenik = new Osudjenik($_POST['id']);
    $rezultat = $osudjenik->deleteById($broker);
    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{
         echo '1';
     }
}

?>