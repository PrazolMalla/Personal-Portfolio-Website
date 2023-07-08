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
    <div class="wrapper2">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
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

//CHeck whether the Submit Button is Clicked on Not
if (isset($_POST['submit'])) {
    //echo "CLicked";

    //1. Get the DAta from Form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);


    //2. Check whether the user with current ID and Current Password Exists or Not
    $sql = "SELECT * FROM admin WHERE id=$id AND password='$current_password'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        //CHeck whether data is available or not
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //User Exists and Password Can be CHanged
            //echo "User FOund";

            //Check whether the new password and confirm match or not
            if ($new_password == $confirm_password) {
                //Update the Password
                $sql2 = "UPDATE admin SET 
                                password='$new_password' 
                                WHERE id=$id
                            ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether the query exeuted or not
                if ($res2 == true) {
                    //Display Succes Message
                    //REdirect to Manage Admin Page with Success Message
                    $_SESSION['change-pwd'] = "<div class='message' data-aos='zoom-out'>Password Changed Successfully.
                    <i class='fas fa-times' onclick='this.parentElement.remove();'></i> </div>";
                    //Redirect the User
                    header('location:' . SITEURL . 'profile.php');
                } else {
                    //Display Error Message
                    //REdirect to Manage Admin Page with Error Message
                    $_SESSION['change-pwd'] = "<div class='message-error' data-aos='zoom-out' >Failed to Change Password. 
                    <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                    </div>";
                    //Redirect the User
                    header('location:' . SITEURL . 'profile.php');
                }
            } else {
                //REdirect to Manage Admin Page with Error Message
                $_SESSION['pwd-not-match'] = "<div class='message-error text-center'data-aos='zoom-out'>
                Password Did not Match. 
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                </div>";
                //Redirect the User
                header('location:' . SITEURL . 'profile.php');
            }
        } else {
            //User Does not Exist Set Message and REdirect
            $_SESSION['user-not-found'] = "<div class='message-error text-center'data-aos='zoom-out'>User Not Found. 
            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
            </div>";
            //Redirect the User
            header('location:' . SITEURL . 'profile.php');
        }
    }

    //3. CHeck Whether the New Password and Confirm Password Match or not

    //4. Change PAssword if all above is true
}

?>
