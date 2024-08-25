<?php
include 'db_config.php';
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $appointment_date = $_POST['appointment_date'];
    $description = $_POST['description'];

    $sql = "INSERT INTO appointments (patient_id, appointment_date, description) VALUES ($patient_id, '$appointment_date', '$description')";
    if ($conn->query($sql) === TRUE) {
        header("Location: view_appointments.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch patients for the dropdown
$sql = "SELECT id, name FROM patients";
$patients_result = $conn->query($sql);
?>

<?php include 'header.php'; ?>

<div class="main-content">
    <h2>Add Appointment</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="add_appointment.php" method="POST">
        <label for="patient_id">Patient:</label>
        <select id="patient_id" name="patient_id" required>
            <option value="">Select a patient</option>
            <?php
            if ($patients_result->num_rows > 0) {
                while ($patient = $patients_result->fetch_assoc()) {
                    echo "<option value='{$patient['id']}'>{$patient['name']}</option>";
                }
            } else {
                echo "<option value=''>No patients found</option>";
            }
            ?>
        </select>
        
        <label for="appointment_date">Appointment Date:</label>
        <input type="datetime-local" id="appointment_date" name="appointment_date" required>
        
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        
        <button type="submit">Add Appointment</button>
    </form>
</div>

<?php include 'footer.php'; ?>
