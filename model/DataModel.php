<?php

function getListData($pdo) {
  $stmt = $pdo->prepare
  ("SELECT * FROM emgData");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function insertSensorData($value, $session, $pdo) {
  try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO emgData (id_exercise,id_muslce,emg_value, emg_time) VALUES (:emgValue, :emgTime, :id_exercise, :id_muscle)");

    $stmt->bindParam(':emgValue', $value['emgValue']);
    $stmt->bindParam(':emgTime', $value['emgTime']);
    $stmt->bindParam(':id_exercise', $session['id_exercise']);
    $stmt->bindParam(':id_muscle', $session['id_muscle']);
    $stmt->execute();
    $pdo->commit();

    return true;
  } catch (Exception $e) {
    $pdo->rollBack();
    return false;
  }
}

function fetchMuscleData($pdo){
  $stmt = $pdo->prepare
  ("SELECT * FROM exercise");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function fetchExerciseData($pdo){
  $stmt = $pdo->prepare
  ("SELECT * FROM muscle");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}