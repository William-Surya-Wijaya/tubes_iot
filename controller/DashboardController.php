<?php 

require_once './model/DataModel.php';

function getResultData(){
  require_once './model/Connection.php';
  return getListData($pdo);
}

function postSensorData($value){
  require_once './model/Connection.php';
  return insertSensorData($value, $pdo);
}