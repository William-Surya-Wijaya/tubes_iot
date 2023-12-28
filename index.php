<?php
include './controller/Controllers.php';

session_start();

if (!isset($_SESSION['initialized'])) {
    $_SESSION['initialized'] = true;
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$route = isset($_GET['route']) ? $_GET['route'] : '';
$subroute = isset($_GET['subroute']) ? $_GET['subroute'] : '';

// echo "Route: $route<br>";
// echo "Subroute: $subroute";
// die();

// Establish database connection
require_once './model/Connection.php';


switch ($route) {
    case 'dashboard':
        $result = getResultData($pdo);
        include './view/dashboard.php';
        break;

    case 'insert-sensor-data':
        postSensorData($_POST, $_SESSION,$pdo);
        break;

    case 'start-fetching':
        $_SESSION['id_muscle'] = $_POST['id_muscle'];
        $_SESSION['id_exercise'] = $_POST['id_exercise']; # kirim id_muslce & id_exercise dari depan
        editFetchFlag('start');
        break;

    case 'stop-fetching':
        editFetchFlag('stop');
        break;        

    default:
    $route = 'dashboard';
        $exercise = getMuscleData($pdo);
        $muscle = getExerciseData($pdo);
        $result = getResultData($pdo);
        include './view/dashboard.php';
        break;
}