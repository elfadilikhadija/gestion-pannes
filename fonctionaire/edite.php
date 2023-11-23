<?php
require '../connexion.php'; 

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $query = "SELECT * FROM pannes WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Record not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];

    $update_query = "UPDATE pannes
                     SET description = '$description', date_debut = '$date_debut'
                     WHERE id = $id";

    if (mysqli_query($con, $update_query)) {
        header('Location: gerer.php');
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
                        <li class="nav-item">
                            <a class="nav-link" href="./controler.php">
                                controler mes pannes
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
                  
    <h2 class="text-center">modifier </h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="<?php echo $row['description']; ?>" required>
        </div>
        <div class="form-group">
            <label for="date_debut">Date de Début:</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?php echo $row['date_debut']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">modifier</button>
    </form>

  

                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
 
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include Bootstrap CSS here -->
</head>
<body>
    
</body>
</html>
