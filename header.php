<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Al-Istiqama University Clinic Management System</title>
    <link rel="stylesheet" href="styless.css">
    <link rel="stylesheet" href="styles2.css">
    <script src="scripts.js" defer></script>
    <script src="scriptss.js" defer></script>
</head>
<body>
    <div class="container">
    <img src="gjh.jpg" alt="corner image" class="corner-image" width="100px" height="90px" align="right">
        <header>
            <h1>Al-Istiqama University Sumaila Clinic Management System</h1>
            <?php if (isLoggedIn()): ?>
                <nav>
                    <a href="dashboard.php">Dashboard</a>
                    <a href="logout.php">Logout</a>
                </nav>
            <?php endif; ?>
        </header>
