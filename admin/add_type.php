<?php
require_once '../connexion.php'; // Include your database con script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['type_name'])) {
    $type_name = $_POST['type_name'];

    // Perform the insertion query
    $insert_query = "INSERT INTO panne_types (type_name) VALUES ('$type_name')";

    if (mysqli_query($con, $insert_query)) {
        // Redirect back to the divisions list page after successful addition
        header('Location: settings.php'); // Replace 'divisions.php' with the actual page URL
        exit;
    } else {
        echo "Error adding division: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($con);
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
                    <i class="fas fa-user-plus"></i> créer un compte
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
        
        <h2 class="mt-4">Ajouter une type de panne</h2>
        <form method="post" action="add_type.php"> 
            <div class="form-group">
                <label for="division_name">Nom de type:</label>
                <input type="text" class="form-control" id="division_name" name="type_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <!-- Existing content -->
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
