<?php
require '../connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $delete_query = "DELETE FROM pannes WHERE id = $id";

    if (mysqli_query($con, $delete_query)) {
        
        header('Location: gerer.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>

<?php
require '../connexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

   
    $delete_query = "DELETE FROM users WHERE id = $id";

    if (mysqli_query($con, $delete_query)) {
        
        header('Location: gestion_account.php');
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
}
?>







