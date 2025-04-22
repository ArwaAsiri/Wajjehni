<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
    <style>
        /* Style for the navigation bar */
.navbar {
    position: fixed;
     bottom: 0;
     left: 0;
     width: 100%;
     background-color: #AC8774;
     text-align: center; /* Align text in the center */
   }
   /* Style for the navigation bar links */
   .navbar a {
     display: inline-block;
     color: #f2f2f2;
     padding: 14px 36px;
     text-decoration: none;
     
   }
   /* Change color on hover */
   .navbar a:hover {
     background-color: #ddd;
     color: black;
   }
    /* Background image */
   body {
     background-image: url('Sc1.png'); /* URL of the background image */
     background-size: cover; /* Cover the entire background */
     background-position: center; /* Center the background image */
     background-repeat: no-repeat; /* Do not repeat the background image */
     background-attachment: fixed; /* Fixed background image */
     text-align: center; /* Aligning the content of the entire page to the center */
     margin: 0; /* Remove default margin */
     padding: 0; /* Remove default padding */ 
   }
    </style>
</head>
<div class="navbar">
    <a href="W3.html"><i class="fas fa-arrow-left"></i></a> <!-- Arrow pointing left icon -->
    <a href="W1.html"><i class="fas fa-calendar-alt"></i></a> <!-- Calendar icon -->
    <a href="test.html"><i class="fas fa-map-marker-alt"></i></a> <!-- Location icon -->
    <a href="#"><i class="fas fa-user"></i></a> <!-- Profile icon -->
  </div>
<body>
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
$sql = "SELECT `EventName`, `EventDate`, `EventLocation`, `EventType`, `EventProvider`, `CertificateAvailability` FROM `UQU Notification`";
$result = mysqli_query($connection, $sql);
// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data as a Bootstrap table
    echo '<div class="container">';
    echo '<table class="table table-striped">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>Event Name</th><th>Event Date</th><th>Event Location</th><th>Event Type</th><th>Event Provider</th><th>Certificate Availability</th></tr>';
    echo '</thead>';
    echo '<tbody>';
    while($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($row['EventName']) . "</td>";      
      echo "<td>" . htmlspecialchars($row['EventDate']) . "</td>";      
      echo "<td>" . htmlspecialchars($row['EventLocation']) . "</td>";  
      echo "<td>" . htmlspecialchars($row['EventType']) . "</td>";      
      echo "<td>" . htmlspecialchars($row['EventProvider']) . "</td>";  
      echo "<td>" . ($row['CertificateAvailability'] ? "Available" : "Not Available") . "</td>";  
      echo "</tr>";
  }
  
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "0 results";
}
// Close connection
mysqli_close($connection);
?>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
