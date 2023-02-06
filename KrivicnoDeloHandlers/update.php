<?php

require "../DBBroker.php";
require "../krivicnodelo.php";

$broker=DBBroker::getBroker();

if(isset($_POST['osudjenik']) && isset($_POST['nazivDela']) && isset($_POST['datum']) )
 && isset($_POST['id']) {

    $krivicnodelopre = new KrivicnoDelo($_POST['id']);
    $krivicnodeloposle = new KrivicnoDelo(null,$_POST['osudjenik'],$_POST['nazivDela'],$_POST['datum']);
    $rezultat = $krivicnodelopre->update($krivicnodeloposle, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }
}

?>