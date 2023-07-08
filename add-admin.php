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
        <h1>Add Admin</h1>

        <br><br>

        <?php
        if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['add']; //Display the SEssion Message if SEt
            unset($_SESSION['add']); //Remove Session Message
        }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
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
//Process the Value from Form and Save it in Database

//Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Button Clicked
    //echo "Button Clicked";

    //1. Get the Data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    //2. SQL Query to Save the data into database
    $sql = "INSERT INTO admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

    //3. Executing Query and Saving Data into Datbase
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
    if ($res == TRUE) {
        //Data Inserted
        //echo "Data Inserted";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='message'>Admin Added Successfully.
        <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
        //Redirect Page to Manage Admin
        header("location:" . SITEURL . 'profile.php');
    } else {
        //FAiled to Insert DAta
        //echo "Faile to Insert Data";
        //Create a Session Variable to Display Message
        $_SESSION['add'] = "<div class='message-error'>Failed to Add Admin.
        <i class='fas fa-times' onclick='this.parentElement.remove();</div>";
        //Redirect Page to Add Admin
        header("location:" . SITEURL . 'add-admin.php');
    }
}

?>