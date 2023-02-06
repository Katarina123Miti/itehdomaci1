<?php

require "../sudija.php";
require '../DBBroker.php';

$broker=DBBroker::getBroker();

$resultSet = Sudija::getAll($broker);
$response=[];

if(!$resultSet){
    $response['status']=0;
    $response['greska']=$broker->getMysqli()->error;
} 
else{
    $response['status']=1;
    while($row=$resultSet->fetch_object()){ 
        $response['sudije'][]=$row;
    }
echo json_encode($response);
}

?>