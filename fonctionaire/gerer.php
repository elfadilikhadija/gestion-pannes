<?php
require '../connexion.php'; // Include your database connection script here

$query = "SELECT p.id, p.description, p.date_debut, p.user_id, pt.type_name AS panne_type_name, d.name AS division_name
          FROM pannes p
          LEFT JOIN panne_types pt ON p.panne_type_id = pt.id
          LEFT JOIN divisions d ON p.division_id = d.id";

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
            background-color: #28a745; /* Change this to your desired background color */
            color: #fff; /* Change this to your desired text color */
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
<body>
   
   
   <div class="container-fluid"> <div class="row">
       <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
           <div class="sidebar-sticky">
               <ul class="nav flex-column">
                   <li class="nav-item">
                       <a class="nav-link " href="./acceuil.php">
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
           <h2>mes pannes</h2>
        <table class="table table-striped table-secondary">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Date de Début</th>
                    <th>User ID</th>
                    <th>Panne Type Name</th>
                    <th>Division Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['date_debut']; ?></td>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['panne_type_name']; ?></td>
                        <td><?php echo $row['division_name']; ?></td>
                        <td>
                            <a href="edite.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Modify</a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                            <a href="details.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary">Details</a>

                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
           </div>
       </main>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
    <div class="container mt-4">
       
    </div>

    <!-- Include Bootstrap JS and jQuery here if needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
