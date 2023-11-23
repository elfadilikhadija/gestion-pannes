<?php
session_start();
require '../connexion.php';

$cin = $_POST['cin'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE cin = '$cin'";
echo $password;

$result = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($result)) {
    if ($password == $row['password']) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_role'] = $row['role'];
        if ($row['role'] == 'admin') {
            header('Location: ./admine.acceuil.php');
            exit;
        } elseif ($row['role'] == 'fonctionnaire') {
            header('Location: fonctionnaire_dashboard.php');
            exit;
        } elseif ($row['role'] == 'technicien') {
            header('Location: technicien_dashboard.php');
            exit;
        }
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}
?>
