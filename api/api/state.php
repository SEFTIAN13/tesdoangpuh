<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$dataFile = __DIR__ . '/../students.json';

if (!file_exists($dataFile)) {
    echo json_encode(['total' => 0, 'by_role' => []]);
    exit();
}

$json = file_get_contents($dataFile);
$students = json_decode($json, true) ?: [];

$stats = [
    'total' => count($students),
    'by_role' => []
];

foreach ($students as $s) {
    $role = trim($s['role'] ?: 'Unknown');
    $stats['by_role'][$role] = ($stats['by_role'][$role] ?? 0) + 1;
}

echo json_encode($stats);