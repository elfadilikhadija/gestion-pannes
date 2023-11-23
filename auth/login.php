<?php
session_start();
require '../connexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cin = $_POST['cin'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $sql = "SELECT * FROM users WHERE cin = '$cin'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            
            if ($password == $row['password']) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['role'] = $row['role'];

                echo '<script>window.location.href = "../' . $row['role'] . '/acceuil.php";</script>';
                exit;
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            $error_message = "User not found.";
        }
    } else {
        $error_message = "Database query error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,300);
        body {
        background-image: url(img.png);
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
        height: 100vh;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        }
        #logo{
        margin: 0;
        margin-left: 500px;
        padding:0 ;
        width: 10%;
        color: #fff;
        position: absolute;
        bottom: 450px;
        left: 550Px;

        }


        .login {
        width: 420px;
        background: #ffffff;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }
        .login:before {
        content: "";
        position: absolute;
        background: transparent;
        bottom: 45px;
        right: 40px;
        width: 55px;
        height: 55px;
        z-index: 5;
        transition: all 0.6s ease-in-out, background 0s ease;
        }
        .login .form {
        display: block;
        position: relative;
        }
        .login .form h2 {
        background: #f5f5fa;
        display: block;
        box-sizing: border-box;
        width: 100%;
        margin: 0 0 30px 0;
        padding: 40px;
        font-weight: 200;
        color: #9596A2;
        font-size: 30px;
        }
        .login .form .form-field {
        display: flex;
        align-items: center;
        height: 55px;
        margin: 0 40px 30px 40px;
        border-bottom: 1px solid #9596A2;
        }
        .login .form .form-field label {
        width: 10px;
        padding: 0 15px 0 0;
        color: #9596A2;
        }
        .login .form .form-field input {
        width: 100%;
        background: transparent;
        color: #9596A2;
        padding: 15px;
        border: 0;
        margin: 0;
        }
        .login .form .form-field input + svg {
        width: 35px;
        width: 35px;
        fill: none;
        stroke: #4caaee;
        stroke-width: 7;
        stroke-linecap: round;
        stroke-dasharray: 1000;
        stroke-dashoffset: -100;
        transition: all 0.3s ease-in-out;
        }
        .login .form .form-field input:valid + svg {
        stroke-dashoffset: 0;
        }
        .login .form .form-field input:focus {
        outline: none;
        }
        .login .form .form-field *::placeholder {
        color: #9596A2;
        }
        .login .form .button {
        width: 100%;
        position: relative;
        cursor: pointer;
        box-sizing: border-box;
        padding: 0 40px 45px 40px;
        margin: 0;
        border: 0;
        background: transparent;
        outline: none;
        }
        .login .form .button .arrow-wrapper {
        transition: all 0.45s ease-in-out;
        position: relative;
        margin: 0;
        width: 100%;
        height: 55px;
        right: 0;
        float: right;
        background: linear-gradient(90deg, #4caaee, #6093f9);
        box-shadow: 0 3px 20px rgba(44, 103, 162, 0.4);
        border-radius: 12px;
        }
        .login .form .button .arrow-wrapper .arrow {
        position: absolute;
        top: 50%;
        margin: auto;
        transition: all 0.45s ease-in-out;
        right: 35px;
        width: 15px;
        height: 2px;
        background: none;
        transform: translateY(-50%);
        }
        .login .form .button .arrow-wrapper .arrow:before {
        position: absolute;
        content: "";
        top: -4px;
        right: 0;
        width: 8px;
        height: 8px;
        border-top: 2px solid #fff;
        border-right: 2px solid #fff;
        transform: rotate(45deg);
        }
        .login .form .button .button-text {
        transition: all 0.45s ease-in-out;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        padding: 0;
        margin: 0;
        color: #fff;
        line-height: 55px;
        text-align: center;
        text-transform: uppercase;
        }
        .login .finished {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 7;
        }
        .login .finished svg {
        width: 100px;
        width: 100px;
        fill: none;
        stroke: #fff;
        stroke-width: 7;
        stroke-linecap: round;
        stroke-dasharray: 1000;
        stroke-dashoffset: -100;
        transition: all 0.3s ease-in-out 0.5s;
        }
        .login.loading .form .button .arrow-wrapper {
        width: 55px;
        animation: sk-rotateplane 1.2s infinite ease-in-out 0.5s;
        }
        .login.loading .form .button .arrow-wrapper .arrow {
        background: #fff;
        transform: translate(15px, 0);
        opacity: 0;
        transition: opacity 0.3s ease-in-out 0.5s;
        }
        .login.loading .form .button .button-text {
        color: #9596A2;
        }
        .login.active:before {
        bottom: 0;
        right: 0;
        background: linear-gradient(90deg, #3a77e7, #97bae5);
        border-radius: 12px;
        height: 100%;
        width: 100%;
        }
        .login.active .form .button .arrow-wrapper {
        animation-iteration-count: 1;
        }
        .login.active .finished svg {
        stroke-dashoffset: 0;
        }

        @-webkit-keyframes sk-rotateplane {
        0% {
            transform: perspective(120px);
        }
        50% {
            transform: perspective(120px) rotateY(180deg);
        }
        100% {
            transform: perspective(120px) rotateY(180deg) rotateX(180deg);
        }
        }
        </style>

</head>
<body>
 <img id ="logo" src="RR.jpg"/>
    
  <div class="login">
    <div class="form">
      <h2> Connexion</h2>
      <form action="login.php" method="POST">
        <div class="form-field">
            <label for="login-mail"><i class='bx bxs-id-card'></i></label>
            <input id="cin" type="text" name="cin" placeholder="cin" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            <svg>
            <use href="#svg-check" />
            </svg>
        </div>
        <div class="form-field">
            <label for="login-password"><i class='bx bxs-lock'></i></label>
            <input id="login-password" type="password" name="password" placeholder="Mot de passe" pattern=".{6,}" required>
            <svg>
            <use href="#svg-check" />
            </svg>
        </div>
        <button type="submit" class="button">
            <div class="arrow-wrapper">
            <span class="arrow"></span>
            </div>
            <p class="button-text">Se connecter</p>
        </button>
        </div>
        <div class="finished">
        <svg>
            <use href="#svg-check" />
        </svg>
    </form>
    </div>
  </div>
  
  
  <!-- //--- ## SVG SYMBOLS ############# -->
  <svg style="display:none;">
    <symbol id="svg-check" viewBox="0 0 130.2 130.2">
      <polyline points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
    </symbol>
  </svg>
  <script src="jquery-3.6.4.min.js"></script>
  <SCript src="./index.Js">
    
  </SCript>
  
</body>
</html>