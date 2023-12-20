<?php
include './controller/Controllers.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$route = isset($_GET['route']) ? $_GET['route'] : '';
$subroute = isset($_GET['subroute']) ? $_GET['subroute'] : '';

// echo "Route: $route<br>";
// echo "Subroute: $subroute";
// die();

switch ($route) {
    case 'dashboard':
        $result = getResultData();
        include './view/dashboard.php';
        break;

    case 'insert-sensor-data':
        postSensorData($_POST);
        break;

    default:
    $route = 'dashboard';
        $result = getResultData();
        include './view/dashboard.php';
        break;
}