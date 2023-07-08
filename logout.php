//Include constants.php for SITEURL
<?php 
    //Start Session
    
    
    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/personal-portfolio/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'portfoliomain');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME);
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:' . SITEURL . 'admin-login.php');
    }


//1. Destory the Session
session_destroy(); //Unsets $_SESSION['user']

//2. REdirect to Login Page
header('location:' . SITEURL . 'admin-login.php');
?>