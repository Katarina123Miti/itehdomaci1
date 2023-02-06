<?php

require "../osudjenik.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

if(isset($_GET['id'])){

    $resultSet = Osudjenik::getById($_GET['id'], $broker);
    $response=[];

    if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
    } 
    else{
    $response['status']=1;
    $response['osudjenik']=$resultSet->fetch_object();

    }

    echo json_encode($response);
}

?>