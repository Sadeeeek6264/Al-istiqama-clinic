<?php
include 'db_config.php';
include 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $department = $_POST['department'];
    $regno = $_POST['regno'];
    $level = $_POST['evel'];
    $identity = $_POST['dentity'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];


    $sql = "INSERT INTO patients (name, department, regno, evel, dentity, age, gender, contact) VALUES ('$name', '$department', '$regno', '$level', '$identity', $age, '$gender', '$contact')";
    if ($conn->query($sql) === TRUE) {
        header("Location: patients.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'header.php'; ?>

<div class="main-content">
    <h2>Add Patient</h2>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="add_patient.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="department">Department:</label>
        <input type="text" id="department" name="department" required>
        
        <label for="regno">Reg. number:</label>
        <input type="text" id="regno" name="regno" required>
        <label for="evel">Level:</label>
        <input type="text" id="evel" name="evel" required>
        
        <label for="dentity">Categogy of identity:</label>
        <select id="dentity" name="dentity" required>
            <option value="staff">Staff</option>
            <option value="student">Student</option>
            <option value="Other">Other</option>
        </select>
        
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
        
        <button type="submit">Add Patient</button>
    </form>
</div>

<?php include 'footer.php'; ?>
