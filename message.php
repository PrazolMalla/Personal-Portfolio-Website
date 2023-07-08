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
    <div class="wrapper1">
        <h1>Messages</h1>
        <br />
        <br /><br />
        <table class="table-wrapper">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Message</th>

            </tr>

            <?php
            //Create a SQL Query to Get all the Food
            $sql = "SELECT * FROM contact_form";

            //Execute the qUery
            $res = mysqli_query($conn, $sql);
            //Count Rows to check whether we have foods or not
            $count = mysqli_num_rows($res);

            //Create Serial Number VAriable and Set Default VAlue as 1
            $sn = 1;

            if ($count > 0) {
                //We have food in Database
                //Get the Foods from Database and Display
                while ($row = mysqli_fetch_assoc($res)) {
                    //get the values from individual columns
                    $fullname = $row['name'];
                    $email = $row['email'];
                    $number = $row['number'];
                    $message = $row['message'];


            ?>
                    <tr>
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $fullname; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $message; ?></td>
                    </tr>
            <?php
                }
            } else {
                //Food not Added in Database
                echo "<tr> <td colspan='7' class='error'> No Feedback. </td> </tr>";
            }

            ?>


        </table>
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
</html>