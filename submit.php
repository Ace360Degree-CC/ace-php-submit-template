<?php
date_default_timezone_set('Asia/Kolkata');

error_reporting(0);



// Define your database connection parameters
$servername = "localhost"; // Change this to your MySQL server hostname
$username = ""; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = ""; // Change this to your MySQL database name

// Create a connection to MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name= $_POST['name'];
        
    $date = date('Y-m-d');
    $time = date('H:i:s');
        
    $sql = "INSERT INTO tablename (name,date,time)
                VALUES ('$name','$date','$time')";

        // Insert the lead data into the database
    
        if ($conn->query($sql) === TRUE) {
            $response['status']='success';
        } else {
            $response['status']='error';
            $response['message']= "Error: " . $sql . "<br>" . $conn->error;
        }
        
        echo json_encode($response);
        
    }


}

// Close the database connection
$conn->close();
?>
