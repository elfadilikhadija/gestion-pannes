<?php
session_start();
require './connexion.php';

$description = $_POST['description'];
$date_debut = $_POST['date_debut'];
$panne_type_id = $_POST['panne_type_id'];

// Retrieve user_id and division_id from session
$user_id = $_SESSION['user_id'];
$division_id = $_SESSION['division_id'];

$sql = "INSERT INTO panne_table (description, date_debut, user_id, panne_type_id, division_id)
        VALUES ('$description', '$date_debut', '$user_id', '$panne_type_id', '$division_id')";

if (mysqli_query($con, $sql)) {
    header('Location: success.php'); // Redirect to success page
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

mysqli_close($con);
?>
