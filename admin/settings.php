<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Gestion de Pannes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
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
                            <i class="fas fa-home"></i> Acceuil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gerer_comptes.php">
                            <i class="fas fa-users"></i> Gérer les Comptes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./creer_compte.php">
                            <i class="fas fa-user-plus"></i> Créer Compte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./gerer.php">
                            <i class="fas fa-exclamation-triangle"></i> Les Pannes
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./setting.php">
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
            <h1 class="text-center">Paramètres de l'Application</h1>



     <div class="container mt-5">

    <h2 class="mt-4">Liste des Divisions</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom de la Division</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch and display divisions from the database
        require'../connexion.php';

        $divisionQuery = "SELECT * FROM divisions";
        $divisionResult = mysqli_query($con, $divisionQuery);

        if ($divisionResult) {
            while ($division = mysqli_fetch_assoc($divisionResult)) {
                echo "<tr>";
                echo "<td>{$division['id']}</td>";
                echo "<td>{$division['name']}</td>";
                echo "<td>
                        <a href='delete_division.php?id={$division['id']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> suprimer</a>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
        </tbody>
    </table>

    <h2 class="mt-4">Liste des Types de Pannes</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom du Type de Panne</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetch and display pannes types from the database
        $pannesTypeQuery = "SELECT * FROM panne_types";
        $pannesTypeResult = mysqli_query($con, $pannesTypeQuery);

        if ($pannesTypeResult) {
            while ($pannesType = mysqli_fetch_assoc($pannesTypeResult)) {
                echo "<tr>";
                echo "<td>{$pannesType['id']}</td>";
                echo "<td>{$pannesType['type_name']}</td>";
                echo "<td>
                        <a href='delete_type.php?id={$pannesType['id']}' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> suprimer</a>
                      </td>";
                echo "</tr>";
            }
        }

        // Close the database connection
        mysqli_close($con);
        ?>
        </tbody>
    </table>

    <a href="add.php" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter une Division</a>
    <a href="add_type.php" class="btn btn-success"><i class="fas fa-plus"></i> Ajouter un Type de Panne</a>
</div>


</body>
</html>

