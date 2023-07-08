<?php

//Include constants.php file here

    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/personal-portfolio/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'portfoliomain');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_connect_error()); //SElecting Database

// 1. get the ID of Admin to be deleted
$id = $_GET['id'];

//2. Create SQL Query to Delete Admin
$sql = "DELETE FROM admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

// Check whether the query executed successfully or not
if ($res == true) {
    //Query Executed Successully and Admin Deleted
    //echo "Admin Deleted";
    //Create SEssion Variable to Display Message
    $_SESSION['delete'] = "<div class='message'>Admin Deleted Successfully.
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
    //Redirect to Manage Admin Page
    header('location:' . SITEURL . 'profile.php');
} else {
    //Failed to Delete Admin
    //echo "Failed to Delete Admin";

    $_SESSION['delete'] = "<div class='message-error'>Failed to Delete Admin. Try Again Later.
    <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
    header('location:' . SITEURL . 'profile.php');
}

    //3. Redirect to Manage Admin page with message (success/error)
