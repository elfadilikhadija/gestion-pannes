
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
                <a class="nav-link" href="./acceuil.html">
                    <i class="fas fa-home"></i> acceuil
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./gerer_comptes.html">
                    <i class="fas fa-users"></i> gerer les comptes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./creer_compte.html">
                    <i class="fas fa-user-plus"></i> creer compte
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./les_pannes.html">
                    <i class="fas fa-exclamation-triangle"></i> les pannes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./settings.html">
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

        echo "<h1 class='text-center'>Bienvenue admine dans l'Application de Gestion de Pannes</h1>";
        echo "<p class='lead text-center'>Ceci est la page d'acceuil de l'application de gestion de pannes. Vous pouvez commencer à utiliser l'application en naviguant dans le menu de gauche.</p>";
        ?>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-home fa-3x mb-3"></i>
                    <h5 class="card-title">Accueil</h5>
                    <p class="card-text">Page d'accueil de l'application.</p>
                    <a href="./admin.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h5 class="card-title">Gérer les Comptes</h5>
                    <p class="card-text">Gérer les comptes d'utilisateurs.</p>
                    <a href="./gerer_comptes.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-user-plus fa-3x mb-3"></i>
                    <h5 class="card-title">Créer Compte</h5>
                    <p class="card-text">Créer un nouveau compte utilisateur.</p>
                    <a href="./create_account.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-exclamation-triangle fa-3x mb-3"></i>
                    <h5 class="card-title">Les Pannes</h5>
                    <p class="card-text">Liste des pannes signalées.</p>
                    <a href="./pannes.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-cog fa-3x mb-3"></i>
                    <h5 class="card-title">Settings</h5>
                    <p class="card-text">Paramètres de l'application.</p>
                    <a href="./settings.php" class="btn btn-primary">Accéder</a>
                </div>
            </div>
        </div>
       
    </div>
</main>

<!-- Cards for Navigation Items -->
<!-- Cards for Navigation Items -->
<div class="container mt-4">
    
</div>


        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
