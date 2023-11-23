<?php
require_once '../connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_pannes_query = "DELETE FROM pannes WHERE panne_type_id = $id";
    if (mysqli_query($con, $delete_pannes_query)) {
        $delete_query = "DELETE FROM panne_types WHERE id = $id";
        if (mysqli_query($con, $delete_query)) {
            header('Location: settings.php');
            exit;
        } else {
            echo "Error deleting panne_type: " . mysqli_error($con);
        }
    } else {
        echo "Error deleting related pannes: " . mysqli_error($con);
    }
}

mysqli_close($con);

?>