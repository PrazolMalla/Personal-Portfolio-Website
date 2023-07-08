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

?>
<!DOCTYPE html>
<html lang="en">

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
<!-- Main content -->
<main>
    <div class="main-content">
    <div class="wrapper1">
        <h1>Dashboard</h1>
        <!-- <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br><br> -->

        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql = "SELECT * FROM category";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            <h4>Categories</h4>
        </div>

        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql2 = "SELECT * FROM portfolio";
            //Execute Query
            $res2 = mysqli_query($conn, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br>
            <h4>Projects</h4>
        </div>

        <div class="col-4 text-center">

            <h1>4</h1>
            <br />
            <h4>Clients</h4>
        </div>

        <div class="col-4 text-center">

            <?php
            //Creat SQL Query to Get Total Revenue Generated
            //Aggregate Function in SQL
            $sql4 = "SELECT * FROM `contact_form`";

            //Execute the Query
            $res4 = mysqli_query($conn, $sql4);

            //Get the VAlue
            $count4 = mysqli_num_rows($res4);

            ?>

            <h1><?php echo $count4; ?></h1>
            <br />
            <h4>Number of Message</h4>
        </div>

        <div class="clearfix"></div>

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