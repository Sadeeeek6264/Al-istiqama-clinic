<?php
include 'db_config.php';
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $appointment_date = $_POST['appointment_date'];
    $description = $_POST['description'];

    $sql = "UPDATE appointments SET appointment_date='$appointment_date', description='$description' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_appointments.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM appointments WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $appointment = $result->fetch_assoc();
    } else {
        header("Location: view_appointments.php");
        exit();
    }
} else {
    header("Location: view_appointments.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<div class="main-content">
    <h2>Edit Appointment</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="edit_appointment.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $appointment['id']; ?>">
        <label for="appointment_date">Appointment Date:</label>
        <input type="datetime-local" id="appointment_date" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $appointment['description']; ?></textarea>
        
        <button type="submit">Update Appointment</button>
    </form>
</div>

<?php include 'footer.php'; ?>
