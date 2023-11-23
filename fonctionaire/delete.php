<?php
require '../connexion.php'; // Include your database connection script here

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform the delete query
    $delete_query = "DELETE FROM pannes WHERE id = $id";

    if (mysqli_query($con, $delete_query)) {
        // Redirect to the data table after successful deletion
        header('Location: gerer.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>
