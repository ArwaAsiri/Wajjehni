<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
$email = $_POST['email'];
$userPassword = $_POST['password']; // Change variable name to avoid conflict
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

$sql = "SELECT * FROM Student WHERE Email='$email' AND password='$userPassword'"; // Change variable name to avoid conflict
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    header("Location: test.html");
    exit();
} else {
    // User not found or password incorrect
    echo "Login failed. Please check your email and password.";
}
mysqli_close($connection);
?>
