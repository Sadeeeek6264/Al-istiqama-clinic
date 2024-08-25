<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM patients WHERE id = $id";
    $result = $conn->query($sql);
    $patient = $result->fetch_assoc();
}
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
 

    $sql = "UPDATE patients SET name='$name', age=$age, gender='$gender', contact='$contact' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: patients.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient</title>
    
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <img src="gjh.jpg" alt="corner image" class="corner-image" width="100px" height="90px" align="right">
        <h1>Update Patient</h1>
        <form action="update_patient.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $patient['name']; ?>" required>
            
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo $patient['age']; ?>" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php if($patient['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($patient['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                <option value="Other" <?php if($patient['gender'] == 'Other') echo 'selected'; ?>>Other</option>
            </select>
            
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $patient['contact']; ?>" required>
            
            <button type="submit">Update Patient</button>
        </form>
    </div>
</body>
</html>
