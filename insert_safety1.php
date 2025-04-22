<?php
// Database credentials
$hostname = "localhost"; // Change this to your database hostname
$username = "root"; // Change this to your database username
$password = "Razan443000"; // Change this to your database password
$database = "Wajjehni2"; // Change this to your database name
// Create connection
$connection = mysqli_connect($hostname, $username, $password, $database);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}

// Insertion for Form 1
if(isset($_POST['urgent'])) {
    $LevelOfDanger = "urgent";
    $studentID = 123456789;
    $details = $_POST['urgent'];

    $sql1 = "INSERT INTO safety (levelOfDanger, StudentID, Details) VALUES ('$LevelOfDanger', '$studentID', '$details')";
    if (mysqli_query($connection, $sql1)) {
        echo "Data inserted successfully for Form 1<br>";
        header("Location: submit.html");
        exit();
    } else {
        echo "Error inserting data for Form 1: " . mysqli_error($connection) . "<br>";
    }
}
// Insertion for Form 2
if(isset($_POST['simple']) ) {
    $LevelOfDanger = "simple";
    $studentID = 123456789;
    $details = $_POST['simple'];
    $sql2 = "INSERT INTO safety (levelOfDanger, StudentID, Details) VALUES ('$LevelOfDanger', '$studentID', '$details')";
    if (mysqli_query($connection, $sql2)) {
        echo "Data inserted successfully for Form 2<br>";
        header("Location: submit.html");
        exit();
    } else {
        echo "Error inserting data for Form 2: " . mysqli_error($connection) . "<br>";
    }
}
// Insertion for Form 2
if(isset($_POST['help'])) {
    $LevelOfDanger = "Help";
    $studentID = 123456789;
    $details = $_POST['help'];
    $sql3 = "INSERT INTO safety (levelOfDanger, StudentID, Details) VALUES ('$LevelOfDanger', '$studentID', '$details')";
    if (mysqli_query($connection, $sql3)) { // Corrected $sql2 to $sql3
        echo "Data inserted successfully for Form 3<br>";
        header("Location: submit.html");
        exit();
    } else {
        echo "Error inserting data for Form 3: " . mysqli_error($connection) . "<br>";
    }
}
// Close the database connection
mysqli_close($connection);
?>