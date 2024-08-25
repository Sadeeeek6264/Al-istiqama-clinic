<?php
include 'db_config.php';
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>

<?php include 'header.php'; ?>

<div class="main-content">
    <h2>Dashboard</h2>
    <nav>
        <a href="add_patient.php">Add Patient</a>
        <a href="add_appointment.php">Add Appointment</a>
        <a href="patients.php">View Patients</a>
        <a href="view_appointments.php">View Appointments</a>
    </nav>
</div>

<?php include 'footer.php'; ?>
