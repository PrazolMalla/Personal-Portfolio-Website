<?php 
    //Start Session
    session_start();

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/personal-portfolio/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'portfoliomain');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error()); //SElecting Database


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body style="background-color: #dad7dc;">
    <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
    <br><br>    
    <header>
        <input type="checkbox" name="" id="nav-toggler" class="fas fa-bars">
        <a href="index.php">
            <div class="logo" style="color: #1b1e1c;">Prazol Malla</div>
        </a>
        <nav class="navbar">
            <a href="index.php" data-text="home">home </a>
            <a href="about.php" data-text="about">about </a>
            <a href="portfolio.php" data-text="portfolio">portfolio </a>
            <a href="contact.php" data-text="contact">contact </a>
            <div class="background-img"></div>
        </nav>
    </header>
    <div class="container1">
        
        <div class="myform">
            <form method ="POST">
                <h2>ADMIN LOGIN</h2>
                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <br>
                <input type="submit" name="submit" class="btn" value="LOGIN"></input>
            </form>
        </div>
        <div class="image">
            <img src="img/login.jpg" alt="" >
        </div>
    </div>
</body>

<?php

//CHeck whether the Submit Button is Clicked or NOt
if (isset($_POST['submit'])) {
    //Process for Login
    //1. Get the Data from Login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //User AVailable and Login Success
        $_SESSION['login'] = "<div class='message' text-center ' data-aos='zoom-out'>Login Successful.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'admin-panel.php');
    } else {
        //User not Available and Login FAil
        $_SESSION['login'] = "<div class='message-error text-center' data-aos='zoom-out'>Username or Password did not match.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>
        ";
        //REdirect to HOme Page/Dashboard
        header('location:' . SITEURL . 'admin-login.php');
    }
}

?>
</html>

