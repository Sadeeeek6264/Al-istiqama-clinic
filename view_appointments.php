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
    <h2>Appointments</h2>
    <table>
        <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php
        $sql = "SELECT appointments.id, patients.name AS patient_name, appointments.appointment_date, appointments.description 
                FROM appointments 
                JOIN patients ON appointments.patient_id = patients.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['patient_name']}</td>
                        <td>{$row['appointment_date']}</td>
                        <td>{$row['description']}</td>
                        <td>
                            <a href='edit_appointment.php?id={$row['id']}'>Edit</a>
                            <a href='delete_appointment.php?id={$row['id']}'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No appointments found</td></tr>";
        }
        ?>
    </table>
</div>

<?php include 'footer.php'; ?>
