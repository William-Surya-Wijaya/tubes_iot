<?php

function getListData($pdo) {
  $stmt = $pdo->prepare
  ("SELECT * FROM emgData");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function insertSensorData($value, $pdo) {
  try {
    $pdo->beginTransaction();
    $stmt = $pdo->prepare("INSERT INTO emgData (value, `timestamp`) VALUES (:emgValue, :emgTime)");

    $stmt->bindParam(':emgValue', $value['emgValue']);
    $stmt->bindParam(':emgTime', $value['emgTime']);
    $stmt->execute();
    $pdo->commit();

    return true;
  } catch (Exception $e) {
    $pdo->rollBack();
    return false;
  }
}