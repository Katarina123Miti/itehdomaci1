<?php

require "../DBBroker.php";
require "../Usluga.php";

$broker=DBBroker::getBroker();

if(isset($_POST['imePrezime']) && isset($_POST['sudija']) && isset($_POST['id'])) {

    $osudjenikkojisemenja = new Usluga($_POST['id'], null, null);
    $osudjenikkojimsemenja = new Usluga(null,$_POST['imePrezime'],$_POST['sudija']);
    $rezultat = $osudjenikkojisemenja->update($osudjenikkojimsemenja, $broker);

    if(!$rezultat){
        echo $broker->getMysqli()->error;
     }else{ 
         echo '1';
     }

}

?>