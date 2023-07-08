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
        <h1>Add Project</h1>

        <br><br>

        <?php

        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }

        ?>

        <br><br>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Project Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Client: </td>
                    <td>
                        <input type="text" name="client" placeholder="Client Name">
                    </td>
                </tr>
                <tr>
                    <td>Url: </td>
                    <td>
                        <input type="text" name="url" placeholder="Project Url">
                    </td>
                </tr>
                <tr>
                    <td>Date: </td>
                    <td>
                        <input type="date" name="date">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                            ob_start();
                            //Create PHP Code to display categories from Database
                            //1. CReate SQL to get all active categories from database
                            $sql = "SELECT * FROM category";

                            //Executing qUery
                            $res = mysqli_query($conn, $sql);

                            //Count Rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //IF count is greater than zero, we have categories else we donot have categories
                            if ($count > 0) {
                                //WE have categories
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of categories
                                    $id = $row['id'];
                                    $title = $row['name'];

                            ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                            <?php
                                }
                            } else {
                                //WE do not have category
                            ?>
                                <option value="0">No Category Found</option>
                            <?php
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Skill: </td>
                    <td>
                        <select name="skill">
                            <?php
                            //Create PHP Code to display categories from Database
                            //1. CReate SQL to get all active categories from database
                            $sql = "SELECT * FROM skills";

                            //Executing qUery
                            $res = mysqli_query($conn, $sql);

                            //Count Rows to check whether we have categories or not
                            $count = mysqli_num_rows($res);

                            //IF count is greater than zero, we have categories else we donot have categories
                            if ($count > 0) {
                                //WE have categories
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //get the details of categories
                                    $id = $row['id'];
                                    $title = $row['name'];

                            ?>

                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                            <?php
                                }
                            } else {
                            ?>
                                <option value="0">No Skill Found</option>
                            <?php
                            }?>

                        </select>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Project" class="btn-secondary">
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
        if (isset($_POST['submit'])) {
            //Add the Food in Database
            //echo "Clicked";

            //1. Get the DAta from Form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            $skills = $_POST['skill'];
            $date = $_POST['date'];
            $url = $_POST['url'];
            $client = $_POST['client'];


            //2. Upload the Image if selected
            //Check whether the select image is clicked or not and upload the image only if the image is selected
            if (isset($_FILES['image']['name'])) {
                //Get the details of the selected image
                $image_name = $_FILES['image']['name'];

                //Check Whether the Image is Selected or not and upload image only if selected
                if ($image_name != "") {
                    // Image is SElected
                    //A. REnamge the Image
                    //Get the extension of selected image (jpg, png, gif, etc.) "vijay-thapa.jpg" vijay-thapa jpg
                    $img = explode('.', $image_name);
                    $ext = end($img);

                    // Create New Name for Image
                    $image_name = "Work-" . rand(0000, 9999) . "." . $ext; //New Image Name May Be "Food-Name-657.jpg"

                    //B. Upload the Image
                    //Get the Src Path and DEstinaton path

                    // Source path is the current location of the image
                    $src = $_FILES['image']['tmp_name'];

                    //Destination Path for the image to be uploaded
                    $dst = "img/" . $image_name;

                    //Finally Uppload the food image
                    $upload = move_uploaded_file($src, $dst);

                    //check whether image uploaded of not
                    if ($upload == false) {
                        //Failed to Upload the image
                        //REdirect to Add Food Page with Error Message
                        $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                        header('location:' . SITEURL . 'admin/add-food.php');
                        //STop the process
                        die();
                    }
                }
            } else {
                $image_name = ""; //SEtting DEfault Value as blank
            }

            //3. Insert Into Database

            //Create a SQL Query to Save or Add food
            // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
            $sql2 = "INSERT INTO portfolio SET 
                    title = '$title',
                    `text` = '$description',
                    client = '$client',
                    image = '$image_name',
                    category = $category,
                    skills = $skills,
                    project_date = '$date',
                    url = '$url'
                ";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //CHeck whether data inserted or not
            //4. Redirect with MEssage to Manage Food page
            if ($res2 == true) {
                //Data inserted Successfullly
                $_SESSION['add'] = "<div class='message'>Project Added Successfully
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
                header("location:" . SITEURL . 'project.php');
            } else {
                //FAiled to Insert Data
                $_SESSION['add'] = "<div class='message-error'>Failed to Add Project
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                </div>";
                header("location:" . SITEURL . 'project.php');
            }
        }
   ob_end_flush();      
?>
