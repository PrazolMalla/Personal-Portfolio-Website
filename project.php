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
<main>
    <div class="main-content">
    <div class="wrapper2">
        <h1>Manage Projects</h1>
        <br />
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //REmoving Session Message
        }

        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if (isset($_SESSION['failed-remove'])) {
            echo $_SESSION['failed-remove'];
            unset($_SESSION['failed-remove']);
        }

        ?>
    <a href="add-project.php" class="btn-primary">Add Project</a>

    <br /><br /><br />
    <div class="table-wrapper">
    <table>
    <tr>
        <th>S.N.</th>
        <th>Title</th>
        <th>Image</th>
        <th>Client</th>
        <th>Actions</th>
    </tr>
    <?php

            //Query to Get all CAtegories from Database
            $sql = "SELECT * FROM portfolio";

            //Execute Query
            $res = mysqli_query($conn, $sql);

            //Count Rows
            $count = mysqli_num_rows($res);

            //Create Serial Number Variable and assign value as 1
            $sn = 1;

            //Check whether we have data in database or not
            if ($count > 0) {
                //We have data in database
                //get the data and display
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image = $row['image'];
                    $client = $row['client'];
                
                ?>
                <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $title; ?></td>

                        <td>

                            <?php
                            //Chcek whether image name is available or not
                            if ($image != "") {
                                //Display the Image
                            ?>

                                <img src="img/<?php echo $image; ?>" width="100px">

                            <?php
                            } else {
                                //DIsplay the MEssage
                                echo "<div class='error'>Image not Added.</div>";
                            }
                            ?>

                        </td>
                        <td><?php echo $client; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>update-project.php?id=<?php echo $id; ?>" class="btn-secondary">Update Project</a>
                            <a href="<?php echo SITEURL; ?>delete-project.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>" class="btn-danger">Delete Project</a>
                        </td>
                        </tr>

                <?php

                }
            } else {
                //WE do not have data
                //We'll display the message inside table
                ?>

                <tr>
                    <td colspan="6">
                        <div class="error">No Project Added.</div>
                    </td>
                </tr>

            <?php
            }
            ?>

        </table>
    </div>
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
</body>

