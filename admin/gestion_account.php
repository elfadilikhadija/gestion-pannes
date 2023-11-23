<?php
require '../connexion.php'; // Include your database connection script here

// Fetch data from the database with JOIN to get Division Name
$query = "SELECT u.id, u.name, u.cin, u.password, u.role, d.name AS division_name
          FROM users u
          LEFT JOIN divisions d ON u.division_id = d.id";

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <!-- Include Bootstrap CSS here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                            <i class="fas fa-users"></i> gerer les comptes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./create_account.php">
                            <i class="fas fa-user-plus"></i> creer compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gerer.php">
                            <i class="fas fa-exclamation-triangle"></i> les pannes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./settings.php">
                            <i class="fas fa-cog"></i> settings
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
    <table class="table table-striped table-secondary">
        <h1 class="text-center mb-5">comptes utilisateurs</h1>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nom</th>
                    <th>CNI</th>
                    <th>mot de passe</th>
                    <th>la fonction</th>
                    <th>Division </th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['cin']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><?php echo $row['division_name']; ?></td>
                        <td>
                            <a href="edite_account.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">
                                <i class="fas fa-edit"></i> modifier
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                <i class="fas fa-trash"></i> suprimer
                            </a>
                        </td>

                    </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
   
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
