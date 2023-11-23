<?php
session_start();
require '../connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = $_POST['cin'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE cin = '$cin'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            
            if ($password == $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['role'] = $row['role'];

                echo '<script>window.location.href = "../' . $row['role'] . '/acceuil.php";</script>';
                exit;
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            $error_message = "User not found.";
        }
    } else {
        $error_message = "Database query error: " . mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <label for="cin">CIN:</label>
        <input type="text" id="cin" name="cin" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
