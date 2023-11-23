<?php
require 'connexion.php';

// Now you can use $conn to perform database operations
$sql = "SELECT * FROM pannes";
$result = $con->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
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
            background-color: #007bff;
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
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-container {
            text-align: center;
        }

        .btn {
           
        }

        .btn-edit {
            background-color: #17a2b8;
        }

        .btn-delete {
            background-color: #dc3545;
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
                            <a class="nav-link active" href="./admin.php">
                                <i class="fas fa-home"></i> acceuil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./declarer.php">
                                declarer un panne
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./gerer.php">
                                gerer mes pannes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./controler.php">
                                controler mes pannes
                            </a>
                        </li>
                        <li class="nav-item m-3 ml-2">
                            <a class="nav-link logout-button" href="#">
                                <button class="btn btn-primary">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </button>
                            </a>
                        </li>
                    </ul>
                    
                    
                </div>
            </nav>
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="">
        <h1 class="mb-3">Liste des Pannes</h1>
        <div class="btn-container">
            <a href="./declarer.php" class="btn btn-primary my-3 w-50">Ajouter</a>
            </div>
<?php
// Include your database connection here
require 'connexion.php';

// Query to retrieve data from the 'pannes' table and join with the 'category' table
$sql = "SELECT p.*, c.nom_cat
        FROM pannes p
        INNER JOIN panne_category c ON p.panne_category_ref = c.ref";

$result = mysqli_query($con, $sql);
?>
<table>
    <thead>
        <tr>
            <th>Nom de Panne</th>
            <th>Description</th>
            <th>Category</th>
            <th>Date de Début</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id=$row['id'];
                echo "<tr>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['nom_cat'] . "</td>"; // Display category name
                echo "<td>" . $row['date_debut'] . "</td>";
                echo "<td>";
                echo "<a href='#' class='btn btn-edit'>modifier</a>";
                echo "<a href='delete.php?id=".$id."' class='btn btn-delete'>suprimer</a>";

                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No data available</td></tr>";
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </tbody>
</table>

</main>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
         const sidebarList = document.querySelector('.nav.flex-column');

        sidebarList.addEventListener('click', (event) => {
            const items = sidebarList.querySelectorAll('.nav-item');

            items.forEach((item) => {
                item.classList.remove('active');
            });

            if (event.target.classList.contains('nav-link')) {
                event.target.parentElement.classList.add('active');
            }
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>