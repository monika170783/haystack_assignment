<?php
session_start();
header('Content-Type: application/json');
include '../database/mysql.php';

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}
$data = json_decode(file_get_contents('php://input'), true);
// Server-side validation
if (empty($data['username']) || empty($data['password'])) {
    echo json_encode(['success' => false, 'message' => 'Username and Password field is required']);
    exit;
}

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $data['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password
        //$hashedPassword =  password_hash($data['password'], PASSWORD_DEFAULT);
       // print_r($hashedPassword, password_verify($data['password'], $user['password'])); die;
        if (password_verify($data['password'], $user['password'])) {
            // Successful login
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to the dashboard or another page
            //header("Location: /assignment/frontend/dashboard.php");
            echo json_encode(['success' => true, 'redirect' => '/assignment/frontend/dashboard.php']);
        } else {
            // Invalid password
            echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
        }
    } else {
        // User not found
        echo json_encode(['success' => false, 'message' => 'Invalid username or password']);
    }

    $stmt->close();
    $conn->close();

?>