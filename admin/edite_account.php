
<?php
require '../connexion.php'; // Include your database connection script here

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record to edit based on the provided ID
    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        // Handle the case where the record does not exist
        echo "Record not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cin = $_POST['cin'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Perform the update query
    $update_query = "UPDATE users
                     SET name = '$name', cin = '$cin', password = '$password', role = '$role'
                     WHERE id = $id";

    if (mysqli_query($con, $update_query)) {
        // Redirect to the data table after successful update
        header('Location: gestion_account.php');
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page avec Sidebar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Open Sans', sans-serif;
        }
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            padding: 20px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }

        .nav-item.active {
            background-color: #28a745; 
            color: #fff; 
        }

        .logout-button {
            position: fixed;
            bottom: 0;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #dee2e6;
            z-index: 999;
        }

        .logout-button i.fas.fa-sign-out-alt {
            margin-right: 10px;
        }
      /* Change the background and text color for the active item */
        .nav-item.active {
        background-color: #28a745; /* Change this to your desired background color */
        color: #fff; /* Change this to your desired text color */
        }


    </style>
</head>
<body>
   
    <div class="container-fluid">
        <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./acceuil.php">
                            <i class="fas fa-home"></i> acceuil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gestion_account.php">
                            <i class="fas fa-users"></i> gérer les comptes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create_account.php">
                            <i class="fas fa-user-plus"></i> créer compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gerer.php">
                            <i class="fas fa-exclamation-triangle"></i> les pannes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./settings.php">
                            <i class="fas fa-cog"></i> paramétres
                        </a>
                    </li>
                    <li class="nav-item m-3 ml-2">
                        <a class="nav-link logout-button" href="../auth/logout.php">
                            <button class="btn btn-primary">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>



<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="container mt-5">
        <?php
        session_start();
        require '../connexion.php';
        // Check if the user is logged in

        ?>
    </div>
    <form method="post">
        <h1 class="text-center mb-5">modifier un compte</h1>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="name">nom:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="cin">CNI:</label>
            <input type="text" class="form-control" id="cin" name="cin" value="<?php echo $row['cin']; ?>" required>
        </div>
        <div class="form-group">
            <label for="password">mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>" required>
        </div>
        <div class="form-group">
            <label for="role">fo,ction:</label>
            <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['role']; ?>" required>
        </div>
        <div class="form-group">
            <label for="division">Division:</label>
            <select class="form-control" id="division" name="division" required>
                <option value="">choisire une Division</option>
                <?php
                // Fetch division names from the database and populate the dropdown
                $division_query = "SELECT id, name FROM divisions";
                $division_result = mysqli_query($con, $division_query);

                while ($division_row = mysqli_fetch_assoc($division_result)) {
                    $selected = ($division_row['id'] == $row['division_id']) ? 'selected' : '';
                    echo "<option value='{$division_row['id']}' {$selected}>{$division_row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="update" class="btn btn-primary">modifier</button>
    </form>
</main>

<!-- Cards for Navigation Items -->
<!-- Cards for Navigation Items -->
<div class="container mt-4">
    
</div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
    </html>
