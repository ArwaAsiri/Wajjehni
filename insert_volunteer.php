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
$VolunteerID =14; // Assuming VolunteerID is retrieved from session
$Name = $_POST['name']; // Assuming Name is provided via form or any other source
$Email = $_POST['email']; // Assuming Email is provided via form or any other source
$password = 1234567890; // Assuming password is provided via form or any other source
$AvilabiltityStatus=TRUE;// Assuming AvilabiltityStatus is provided via form or any other source
$GuidanceType ="Academic"; // Assuming GuidanceType is provided via form or any other source
$Specialty = $_POST['department']; // Assuming Specialty is provided via form or any other source
$AcademicLevel = $_POST['academic_level']; // Assuming AcademicLevel is provided via form or any other source
//$Time =0; // Assuming Time is provided via form or any other source
$Points = $_POST['points']; // Assuming Points is provided via form or any other source
$pointsEarned =0; // Assuming pointsEarned is provided via form or any other source
// Insert data into the database
$sql = "INSERT INTO `volunteer` (VolunteerID, Name, Email, password, AvilabiltityStatus, `Guidance Type`, Specialty, AcademicLevel, Time, Points, pointsEarned) 
        VALUES ('$VolunteerID', '$Name', '$Email', '$password', '$AvilabiltityStatus', '$GuidanceType', '$Specialty', '$AcademicLevel', NOW(), '$Points', '$pointsEarned')";

if (mysqli_query($connection, $sql)) {
    echo "Data inserted successfully";
    header("Location: select Type of volunteering.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}
// Close the database connection
mysqli_close($connection);

?>
