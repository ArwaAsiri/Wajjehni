<?php

// Assuming you have already established a database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve the textarea content


// Retrieve other necessary variables for insertion



// Manually inserted data

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

$RateID=13;
$StudentID=123456789 ;//حطي اللي عندك من الداتابيس في تيبل الستودنت;
$VolunteerID=111111111 ;//وهنا حطي نفس الشي من تيبل الفولنتير
$NumberOfStars = 5;
$RatingList="cooaprative";
$Feedback= $_POST['additional_comments'];


// Prepare SQL query to insert the data into the database
$sql = "INSERT INTO Rating (RateID, StudentID, VolunteerID, NumberOfStars, RatingList, Feedback) 
        VALUES ($RateID, $StudentID, $VolunteerID, $NumberOfStars, '$RatingList','$Feedback')";

// Execute the SQL query
if (mysqli_query($connection, $sql)) {
    echo "Data added to the database successfully";
    header("Location: FeedbackConfirmed.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
