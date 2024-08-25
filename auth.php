<?php
include 'db_config.php';

session_start();

function register($username, $password,  $role, $email) {
    global $conn;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, password, role, email) VALUES ('$username', '$password', '$role', '$email')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

function login($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function logout() {
    session_destroy();
}
?>
