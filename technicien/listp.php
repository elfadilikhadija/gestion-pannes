
<?php
    require '../connexion.php';

    // Fetch "panne_name" and "pannes" from your database
    $sql = "SELECT p.id AS panne_id, p.date_debut , u.name, pt.type_name, p.description
            FROM pannes p
            INNER JOIN users u ON p.user_id = u.id
            INNER JOIN panne_types pt ON p.panne_type_id = pt.id";

    $result = $con->query($sql);


    // Fetch "type_name" from the "pannes_type" table for populating the dropdown
    $sqlPanneTypes = "SELECT type_name FROM panne_types";
    $resultPanneTypes = $con->query($sqlPanneTypes);

    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once '../connexion.php';

            $comment = $con->real_escape_string($_POST['comment']);
            $panne_id = $_POST['panne_id'];

            // Check if the user_id is a positive integer (or the appropriate data type)
            if (!is_numeric($user_id) || $user_id <= 0) {
                echo "Invalid user ID.";
                exit; // Exit the script
            }

            // Check if the panne_id is a positive integer (or the appropriate data type)
            if (!is_numeric($panne_id) || $panne_id <= 0) {
                echo "Invalid panne ID.";
                exit; // Exit the script
            }

            $sql = "INSERT INTO comments (tech_id, panne_id, comment_text) VALUES (?, ?, ?)";
            $stmt = $con->prepare($sql);

            if ($stmt) {
                $stmt->bind_param('iis', $user_id, $panne_id, $comment);
                if ($stmt->execute()) {
                    echo "";
                } else {
                    echo "Error executing query: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing the query: " . $con->error;
            }

            $con->close();
        }
        } else {
            echo "User not logged in. Please log in to leave a comment.";
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
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
            
            .comment-form {
                display: none;
            }
        
            .nav-item.active {
                background-color: #28a745; 
                color: #fff; 
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
                            <a class="nav-link" href="./listp.php">
                                list de pannes
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
                    <h1 class="text-center">list de pannes</h1>j
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Panne Type</th>
                                <th>date debut</th>
                                <th>Description</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['type_name'] . "</td>";
                                echo "<td>" . $row['date_debut'] . "</td>";
                                echo "<td>" . $row['description'] . "</td>";
                                echo "<td>";
                                echo "<button class='btn btn-primary show-comment-button'>comment</button>";
                                echo "<div class='comment-form'>";
                                echo "<form action='listp.php' method='post'>";
                                echo "<input type='hidden' name='panne_id' value='" . $row['panne_id'] . "'>";
                                echo "<textarea name='comment' rows='4' cols='50' placeholder='Enter your comment'></textarea>";
                                echo "<br>";
                                echo "<input type='submit' value='Submit Comment'>";
                                echo "</form>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
    
                        </tbody>
                    </table>




   

  

                </div>
            </main>
        </div>
    </div>
    


    <script>
        document.querySelectorAll('.show-comment-button').forEach(function(button) {
            button.addEventListener('click', function () {
                var commentForm = this.nextElementSibling; // Find the next element, which is the comment form
                if (commentForm.style.display === 'none') {
                    commentForm.style.display = 'block';
                } else {
                    commentForm.style.display = 'none';
                }
            });
        });
    </script>


 
</body>
</html>
