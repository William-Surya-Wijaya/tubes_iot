<?php

function getListData($pdo) {
  $stmt = $pdo->prepare
  ("SELECT * FROM emgData");

  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}