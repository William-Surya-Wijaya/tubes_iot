<?php
$controllerFolder = __DIR__.'/';
$files = scandir($controllerFolder);

foreach ($files as $file) {
  if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
    require_once $controllerFolder . $file;
  }
}