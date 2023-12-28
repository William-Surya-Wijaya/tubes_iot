<?php

require_once './model/DataModel.php';
require_once './model/Connection.php';




function getResultData($pdo){
  return getListData($pdo);
}

function postSensorData($pdo, $value, $session){
  return insertSensorData($pdo, $value, $session);
}

function editFetchFlag($value){
  file_put_contents('./fetch_flag.txt', $value);
  $return = ($value == 'start') ? 'Start fetching data from emg sensor.' : 'Stop fetching data from emg sensor.';
  return $return;
}

function getMuscleData($pdo){
  return fetchMuscleData($pdo);
}

function getExerciseData($pdo){
  return fetchExerciseData($pdo);
}
