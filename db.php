<?php

// Create a database connection
$connection=mysqli_connect("192.168.70.130","ecomuser","ecompassword","ecomdb","3306");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["name"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    
    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO food_items (title, description, image) VALUES (?, ?, ?)");
    
    // Bind parameters to the statement
    $stmt->bind_param( $title, $description, $image);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Form data submitted successfully.";
        echo var_dump($title, $description, $image);
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
