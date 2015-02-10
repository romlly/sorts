<?php
require_once __DIR__ . '/bootstrap.php';

$benchmarker = new \sort\controllers\Benchmarker();
$benchmarker->run();
