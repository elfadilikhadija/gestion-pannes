

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page avec Sidebar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


    <style>
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
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="acceui.php">
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
                            <a class="nav-link logout-button" href="#">
                                <button class="btn btn-primary">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </button>
                            </a>
                        </li>
                    </ul>
                    
                    
                </div>
            </nav>

            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js">
        // const sidebarList = document.querySelector('.nav.flex-column');

        // sidebarList.addEventListener('click', (event) => {
        //     const items = sidebarList.querySelectorAll('.nav-item');

        //     items.forEach((item) => {
        //         item.classList.remove('active');
        //     });

        //     if (event.target.classList.contains('nav-link')) {
        //         event.target.parentElement.classList.add('active');
        //     }
        // });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>