<?php
include 'db_config.php';
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM appointments WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_appointments.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    header("Location: view_appointments.php");
    exit();
}
?>
