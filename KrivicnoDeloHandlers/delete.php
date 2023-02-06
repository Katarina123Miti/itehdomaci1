<?php

require "../DBBroker.php";
require "../krivicnodelo.php";

$broker=DBBroker::getBroker();

if(isset($_POST['id'])){

    $krivicnodelo = new KrivicnoDelo($_POST['id']);
    $rezultat = $krivicnodelo->deleteById($broker);

        if(!$rezultat){
            echo $broker->getMysqli()->error;
        }else{
            echo '1';
        }
}

?>