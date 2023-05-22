<?php
// Assuming you have a database connection established
$connection=mysqli_connect("localhost","my_user","my_password","my_db");
// Query to fetch data from the database
$query = "SELECT image, title, description FROM food_items";

// Execute the query
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data and display it
    while ($row = mysqli_fetch_assoc($result)) {
        $image = $row['image'];
        $title = $row['title'];
        $description = $row['description'];

        // Output the fetched data
        echo '<div class="w3-quarter">';
        echo '<img src="' . $image . '" alt="' . $title . '" style="width:100%">';
        echo '<h3>' . $title . '</h3>';
        echo '<p>' . $description . '</p>';
        echo '</div>';
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    // Error handling if the query fails
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
