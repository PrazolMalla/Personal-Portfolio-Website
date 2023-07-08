<?php
//Include Constants File
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

//echo "Delete Page";
//Check whether the id and image_name value is set or not
if (isset($_GET['id']) and isset($_GET['image'])) {
    //Get the Value and Delete
    //echo "Get Value and Delete";
    $id = $_GET['id'];
    $image_name = $_GET['image'];

    //Remove the physical image file is available
    if ($image_name != "") {
        //Image is Available. So remove it
        $path = "img/" . $image_name;
        //REmove the Image
        $remove = unlink($path);

        //IF failed to remove image then add an error message and stop the process
        if ($remove == false) {
            //Set the SEssion Message
            $_SESSION['remove'] = "<div class='message-error'>Failed to Remove Project Image.
            <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
            //REdirect to Manage Category page
            header('location:' . SITEURL . 'project.php');
            //Stop the Process
            die();
        }
    }

    //Delete Data from Database
    //SQL Query to Delete Data from Database
    $sql = "DELETE FROM portfolio WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the data is delete from database or not
    if ($res == true) {
        //SEt Success MEssage and REdirect
        $_SESSION['delete'] = "<div class='message'>Project Deleted Successfully.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>";
        //Redirect to Manage Category
        header('location:' . SITEURL . 'project.php');
    } else {
        //SEt Fail MEssage and Redirecs
        $_SESSION['delete'] = "<div class='message-error'>Failed to Delete Project.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>";
        //Redirect to Manage Category
        header('location:' . SITEURL . 'project.php');
    }
} else {
    //redirect to Manage Category Page
    header('location:' . SITEURL . 'project.php');
}

?>