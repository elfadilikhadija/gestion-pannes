<?php
require_once '../connexion.php'; // Include your database con script

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete query
    $delete_query = "DELETE FROM divisions WHERE id = $id";

    if (mysqli_query($con, $delete_query)) {
        // Redirect back to the divisions list page after successful deletion
        header('Location: setting.php'); // Replace 'divisions.php' with the actual page URL
        exit;
    } else {
        echo "Error deleting division: " . mysqli_error($con);
    }
}

// Close the database con
mysqli_close($con);
?>