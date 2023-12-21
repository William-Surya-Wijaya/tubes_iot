<?php 

require_once './model/DataModel.php';

function getResultData(){
  require_once './model/Connection.php';
  return getListData($pdo);
}

function postSensorData($value, $session){
  require_once './model/Connection.php';
  return insertSensorData($value, $session, $pdo);
}

function editFetchFlag($value){
  file_put_contents('./fetch_flag.txt', $value);
  $return = ($value == 'start') ? 'Start fetching data from emg sensor.' : 'Stop fetching data from emg sensor.';
  return $return;
}

function getMuscleData(){
  require_once './model/Connection.php';
  return fetchMuscleData($pdo);
}

function getExerciseData(){
  require_once './model/Connection.php';
  return fetchExerciseData($pdo);
}