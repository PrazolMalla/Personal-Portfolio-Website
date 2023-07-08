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
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body style="background-color: #dad7dc;">
<section id="main">
<aside>
    <nav class="nav1">

            <div class="nav-links" id="navLinks">
            
                <i class="fa-sharp fa-solid fa-xmark" onclick="hideMenu()"></i>  
                <p style="color:#fff; margin:5px; text-align:center;">WELCOME ,<?php echo $_SESSION['user']?></p>
                <ul>
                    <li><a href="admin-panel.php"> Dashboard</a></li>
                    <li><a href="profile.php"> Profile</a></li>
                    <li><a href="project.php"> Project</a></li>
                    <li><a href="message.php"> Messages</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <i class="fa-solid fa-bars" onclick="showMenu()"></i>
            
        </nav>
</aside>
<main>
<div class="main-content">
    <div class="wrapper1">
        <h1>Update Project</h1>

        <br><br>

        <?php
        //1. Get the ID of Selected Admin
        $id = $_GET['id'];

        //2. Create SQL Query to Get the Details
        $sql = "SELECT * FROM admin WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have admin data or not
            if ($count == 1) {
                // Get the Details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res);

                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                //Redirect to Manage Admin PAge
                header('location:' . SITEURL . 'profile.php');
            }
        }

        ?>
        <form action="" method="POST">

<table class="tbl-30">
    <tr>
        <td>Full Name: </td>
        <td>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
        </td>
    </tr>

    <tr>
        <td>Username: </td>
        <td>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
        </td>
    </tr>

</table>

</form>
</div>
</div>
</main>
</section>
<script>

var navLinks = document.getElementById("navLinks");
function showMenu(){
    navLinks.style.left="0"
}

function hideMenu(){
    navLinks.style.left="-200px"
}
</script>
<script src="https://kit.fontawesome.com/6fd8a997cb.js" crossorigin="anonymous"></script>
</body>

</html>
<?php

//Check whether the Submit Button is Clicked or not
if (isset($_POST['submit'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Create a SQL Query to Update Admin
    $sql = "UPDATE admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id='$id'
        ";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['update'] = "<div class='message' data-aos='zoom-out'>Admin Updated Successfully.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>";
        //Redirect to Manage Admin Page
        header('location:' . SITEURL . 'profile.php');
    } else {
        //Failed to Update Admin 
        $_SESSION['update'] = "<div class='message-error' data-aos='zoom-out' >Failed to Update Admin.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
        </div>";
        //Redirect to Manage Admin Page
        header('location:' . SITEURL . 'profile.php');
    }
}

?>
