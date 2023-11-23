<?php
session_start();
require '../connexion.php';

$panne_types_query = "SELECT * FROM panne_types";
$panne_types_result = mysqli_query($con, $panne_types_query);

// Fetch divisions again before using in the form
$division_query = "SELECT * FROM divisions";
$div = mysqli_query($con, $division_query);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id']) ) {
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $panne_type_id = $_POST['panne_type_id'];
    $user_id = $_SESSION['user_id'];
    $division_id = $_POST['division_id'];

    $insert_query = "INSERT INTO pannes (description, date_debut, user_id, panne_type_id, division_id) 
                    VALUES ('$description', '$date_debut', '$user_id', '$panne_type_id', '$division_id')";

    if (mysqli_query($con, $insert_query)) {
        header('Location: success.html');
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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
            .nav-item.active {
                background-color: #28a745;
                color: #fff; 
            }


        </style>
    </head>
<body>
   
<?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
   
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
                                déclarer un panne
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./gerer.php">
                                gérer mes pannes
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
                    <h1 class="text-center"> declarer un panne</h1>
                    <form action="declarer.php" method="POST">
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" id="description" name="description" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="date_debut">Date de Début:</label>
                                        <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="panne_type_id">type de panne:</label>
                                        <select class="form-control" id="panne_type_id" name="panne_type_id" required>
                                            <option value="">Selecter un type de panne</option>
                                            <?php while ($row = mysqli_fetch_assoc($panne_types_result)) : ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="panne_type_id">division:</label>
                                        <select class="form-control"  name="division_id" required>
                                            <option value="">Selecter votre division</option>
                                            <?php while ($row = mysqli_fetch_assoc($div)) : ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    
                                        
                                    </div> 
                                    
                                    <button type="submit" class="btn btn-primary">envoyer</button>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function validateForm() {
            var description = document.getElementById("description").value;
            var dateDebut = document.getElementById("date_debut").value;
            var panneTypeId = document.getElementById("panne_type_id").value;

            if (description === "" || dateDebut === "" || panneTypeId === "") {
                alert("Please fill in all fields.");
                return false;
            }
            // You can add more complex validation logic here if needed
            return true;
        }
</script>
</body>


</html>
