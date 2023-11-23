<?php
session_start();
require '../connexion.php';

$description = $_POST['description'];
$date_debut = $_POST['date_debut'];
$panne_type_id = $_POST['panne_type_id'];

$user_id = $_SESSION['user_id'];
$division_id = $_POST['division_id'];


if (mysqli_num_rows($division_check_result) > 0) {
    $sql = "INSERT INTO pannes (description, date_debut, user_id, panne_type_id, division_id)
            VALUES ('$description', '$date_debut', '$user_id', '$panne_type_id', '$division_id')";

    if (mysqli_query($con, $sql)) {
        header('Location: success.php'); 
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
} else {
    echo "The division ID doesn't exist in the divisions table.";
}

mysqli_close($con);
?>
