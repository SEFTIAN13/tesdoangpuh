<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$dataFile = __DIR__ . '/../students.json';

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Fungsi baca data
function loadStudents() {
    global $dataFile;
    if (!file_exists($dataFile)) {
        return [];
    }
    $json = file_get_contents($dataFile);
    return json_decode($json, true) ?: [];
}

// Fungsi simpan data
function saveStudents($students) {
    global $dataFile;
    file_put_contents($dataFile, json_encode($students, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $students = loadStudents();
    
    // Filter by role
    if (isset($_GET['role']) && !empty($_GET['role'])) {
        $role = strtolower(trim($_GET['role']));
        $students = array_filter($students, function($s) use ($role) {
            return strtolower(trim($s['role'])) === $role;
        });
    }
    
    // Search by name, dream, or social
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = strtolower(trim($_GET['search']));
        $students = array_filter($students, function($s) use ($search) {
            return strpos(strtolower($s['name']), $search) !== false ||
                   strpos(strtolower($s['dream']), $search) !== false ||
                   strpos(strtolower($s['social']), $search) !== false;
        });
    }
    
    echo json_encode(array_values($students));
    exit();
}

// POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (!$input) {
        http_response_code(400);
        echo json_encode(['error' => 'Data tidak ditemukan']);
        exit();
    }
    
    $required = ['name', 'role', 'social', 'dream', 'photo'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            http_response_code(400);
            echo json_encode(['error' => "$field wajib diisi"]);
            exit();
        }
    }
    
    $students = loadStudents();
    $newId = count($students) + 1;
    $student = [
        'id' => $newId,
        'name' => $input['name'],
        'role' => $input['role'],
        'social' => $input['social'],
        'dream' => $input['dream'],
        'photo' => $input['photo']
    ];
    
    $students[] = $student;
    saveStudents($students);
    
    http_response_code(201);
    echo json_encode($student);
    exit();
}

// Method not allowed
http_response_code(405);
echo json_encode(['error' => 'Method not allowed']);