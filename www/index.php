<?php

require_once __DIR__ . '/../bootstrap.php';

$controller = new \sort\controllers\BenchmarkViewer();
$controller->showBenchmark(isset($_GET['benchmark']) ? $_GET['benchmark'] : null);
