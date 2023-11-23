<?php
require_once '../connexion.php';

        ?>
        
        
        
      
       
       
    
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
        
        <h2 class="mt-4 text-center">ticket de panne</h2>
        <?php
require '../connexion.php'; // Include your database connection script here

if (isset($_GET['id'])) {
    $panne_id = $_GET['id'];

    // Fetch the specific "panne" details based on the 'id'
    // Fetch the specific "panne" details based on the 'id'
    $query = "SELECT
    p.id AS panne_id,
    p.description AS panne_description,
    p.date_debut,
    u1.name AS panne_user_name,
    pt.type_name,
    d.name AS division_name,
    c.comment_text,
    u2.name AS tech_user_name
FROM pannes p
LEFT JOIN comments c ON p.id = c.panne_id
LEFT JOIN users u1 ON p.user_id = u1.id
LEFT JOIN users u2 ON c.tech_id = u2.id
LEFT JOIN panne_types pt ON p.panne_type_id = pt.id
LEFT JOIN divisions d ON p.division_id = d.id
WHERE p.id = $panne_id";

$result = mysqli_query($con, $query);
if ($result === false) {
    die("Error: " . mysqli_error($con));
}
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

       
        // Assuming you have the PHP code to fetch and store the data in $data
        
            echo '<div class="card mb-4">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">Panne ID: <b class="text-secondary mx-3">' . $row['panne_id'] . '</b></h5>';
            echo '<p class="card-text">Panne Description: <b class="text-secondary mx-3">' . $row['panne_description'] . '</b></p>';
            echo '<p class="card-text">Date Debut: <b class="text-secondary mx-3">' . $row['date_debut'] . '</b></p>';
            echo '<p class="card-text">Panne User: <b class="text-secondary mx-3">' . $row['panne_user_name'] . '</b></p>';
            echo '<p class="card-text">Panne Type: <b class="text-secondary mx-3">' . $row['type_name'] . '</b></p>';
            echo '<p class="card-text">Division Name: <b class="text-secondary mx-3">' . $row['division_name'] . '</b></p>';
            echo '<p class="card-text comment">Comment: <b class="text-secondary mx-3">' . $row['comment_text'] . '</b></p>';
            echo '<p class="card-text">Tech User: <b class="text-secondary mx-3">' . $row['tech_user_name'] . '</b></p>';
            echo '</div>';
            echo '</div>';
     
    
    } else {
        echo 'Panne not found.';
    }
} else {
    echo 'Invalid request. Please provide a valid panne ID.';
}
?>

<a href="?download_pdf=1" class="btn btn-primary">Télécharger PDF</a>

    
</main>



<div class="container mt-4">
    
</div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
    </html>
