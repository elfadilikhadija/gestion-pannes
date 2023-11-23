<?php
session_start();
require '../connexion.php';

// Get user_id and division_id from the session
if (isset($_SESSION['division_id'])) {
$user_id = $_SESSION['user_id'];
$division_id = $_SESSION['division_id'];
}else{
// Fetch panne_types from the database
$panne_types_query = "SELECT * FROM panne_types";
$panne_types_result = mysqli_query($con, $panne_types_query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $panne_type_id = $_POST['panne_type_id'];

    // Insert data into the table
    $insert_query = "INSERT INTO your_table_name (description, date_debut, user_id, panne_type_id, division_id)
                     VALUES ('$description', '$date_debut', '$user_id', '$panne_type_id', '$division_id')";

    if (mysqli_query($con, $insert_query)) {
        // Redirect to the acceuil page after successful insertion
        header('Location: acceuil.php');
        exit;
    } else {
        $error_message = "Database query error: " . mysqli_error($con);
    }
}}
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
    <!-- Include Bootstrap CSS here -->
</head>
<body>
    <h1>Form</h1>
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
                        <label for="panne_type_id">Panne Type:</label>
                        <select class="form-control" id="panne_type_id" name="panne_type_id" required>
                            <option value="">Select Panne Type</option>
                            <?php while ($row = mysqli_fetch_assoc($panne_types_result)) : ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
