<?php

require "../DBBroker.php";
require "../krivicnodelo.php";

$broker=DBBroker::getBroker();

if(isset($_POST['osudjenik']) && isset($_POST['nazivDela']) && isset($_POST['datum']) ){
        $krivicnodelo = new KrivicnoDelo(null,$_POST['osudjenik'],$_POST['nazivDela'],$_POST['datum'] );
        $rezultat = KrivicnoDelo::add($krivicnodelo, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
    }else{ 
         echo '1';
    }
}

?>