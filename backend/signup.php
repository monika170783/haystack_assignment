<?php
header('Content-Type: application/json');
include '../database/mysql.php';

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}
$data = json_decode(file_get_contents('php://input'), true);

// Server-side validation
if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['phone']) || empty($data['username']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'All fields are required']);
    exit;
}


// Further validation and database insertion logic
// Assume we have a function `saveUser` to save the user to the database

$result = saveUser($data);

function saveUser($data) {
    global $conn;

    // Check if user already exists by email or username
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
    $stmt->bind_param('ss', $data['email'], $data['username']);
    $stmt->execute();
    $stmt->bind_result($userCount);
    $stmt->fetch();
    $stmt->close();

    if ($userCount > 0) {
        echo json_encode(['success' => false, 'message' => 'User with this email or username already exists']);
        return;
    }

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, phone, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $result = $stmt->execute([$data['first_name'], $data['last_name'], $data['email'], $data['phone'], $data['username'], password_hash($data['password'], PASSWORD_DEFAULT)]);
    if (!$result) {
        echo json_encode(['success' => false, 'message' => 'Failed to save user']);
    } else {
        echo json_encode(['success' => true, 'redirect' => '/assignment/frontend/login.php']);
    }
    return;
}
?>
