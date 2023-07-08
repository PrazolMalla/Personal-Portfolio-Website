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
        <h1>Update Food</h1>
        <br><br>

        <?php

        //CHeck whether id is set or not 
        if (isset($_GET['id'])) {
            //Get all the details
            $id = $_GET['id'];

            //SQL Query to Get the Selected Food
            $sql2 = "SELECT * FROM portfolio WHERE id=$id";
            //execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Get the value based on query executed
            $row2 = mysqli_fetch_assoc($res2);

            //Get the Individual Values of Selected Food
            $title = $row2['title'];
            $description = $row2['text'];
            $skills = $row2['skills'];
            $current_image = $row2['image'];
            $category = $row2['category'];
            $date = $row2['project_date'];
            $url = $row2['url'];
            $client = $row2['client'];
        } else {
            //Redirect to Manage Food
            header('location:' . SITEURL . 'admin/project.php');
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">

    <tr>
        <td>Title: </td>
        <td>
            <input type="text" name="title" value="<?php echo $title; ?>">
        </td>
    </tr>

    <tr>
        <td>Description: </td>
        <td>
            <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
        </td>
    </tr>
    <tr>
        <td>Client: </td>
        <td>
            <input type="text" name="client" placeholder="Client Name" value="<?php echo $client;?>">
        </td>
        </tr>
    <tr>
        <td>Url: </td>
        <td>
            <input type="text" name="url" placeholder="Project Url" value="<?php echo $url;?>">
         </td>
    </tr>
    <tr>
        <td>Date: </td>
        <td>
            <input type="date" name="date" value = "<?php echo $date; ?>">
        </td>
    </tr>    
                                           
                       
    <tr>
        <td>Current Image: </td>
        <td>
            <?php
            if ($current_image == "") {
                //Image not Available 
                echo "<div class='error'>Image not Available.</div>";
            } else {
                //Image Available
            ?>
                <img src="<?php echo SITEURL; ?>img/<?php echo $current_image; ?>" width="150px">
            <?php
            }
            ?>
        </td>
    </tr>

    <tr>
        <td>Select New Image: </td>
        <td>
            <input type="file" name="image">
        </td>
    </tr>
    <tr>
        <td>Category: </td>
                <td>
                  <select name="category">
                     <?php
                     ob_start();
                     $sql = "SELECT * FROM category";
                     //Execute the Query
                     $res = mysqli_query($conn, $sql);
                     //Count Rows
                     $count = mysqli_num_rows($res);

                     //Check whether category available or not
                     if ($count > 0) {
                         //CAtegory Available
                         while ($row = mysqli_fetch_assoc($res)) {
                             $category_title = $row['name'];
                             $category_id = $row['id'];

                             //echo "<option value='$category_id'>$category_title</option>";
                     ?>
                             <option <?php if ($category == $category_id) {
                                         echo "selected";
                                     } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                     <?php
                         }
                     } else {
                         //CAtegory Not Available
                         echo "<option value='0'>Category Not Available.</option>";
                     }

                     ?>

                 </select>
             </td>
         </tr>
         <tr>
        <td>skills: </td>
                <td>
                  <select name="skill">
                     <?php
                     $sql = "SELECT * FROM skills";
                     //Execute the Query
                     $res = mysqli_query($conn, $sql);
                     //Count Rows
                     $count = mysqli_num_rows($res);

                     //Check whether category available or not
                     if ($count > 0) {
                         //CAtegory Available
                         while ($row = mysqli_fetch_assoc($res)) {
                             $skills_title = $row['name'];
                             $skills_id = $row['id'];

                             //echo "<option value='$category_id'>$category_title</option>";
                     ?>
                             <option <?php if ($skills == $skills_id) {
                                         echo "selected";
                                     } ?> value="<?php echo $skills_id; ?>"><?php echo $skills_title; ?></option>
                     <?php
                         }
                     } else {
                         //CAtegory Not Available
                         echo "<option value='0'>Category Not Available.</option>";
                     }

                     ?>

                 </select>
             </td>
         </tr>
         <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                        <br><br>

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
            //echo "Button Clicked";

            //1. Get all the details from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $skills = $_POST['skill'];
            $date = $_POST['date'];
            $url = $_POST['url'];
            $client = $_POST['client'];


            //2. Upload the image if selected

            //CHeck whether upload button is clicked or not
            if (isset($_FILES['image']['name'])) {
                //Upload BUtton Clicked
                $image_name = $_FILES['image']['name']; //New Image NAme

                //CHeck whether th file is available or not
                if ($image_name != "") {
                    //IMage is Available
                    //A. Uploading New Image

                    //REname the Image
                    $ext = end(explode('.', $image_name)); //Gets the extension of the image

                    $image_name = "Work-" . rand(0000, 9999) . '.' . $ext; //THis will be renamed image

                    //Get the Source Path and DEstination PAth
                    $src_path = $_FILES['image']['tmp_name']; //Source Path
                    $dest_path = "img/" . $image_name; //DEstination Path

                    //Upload the image
                    $upload = move_uploaded_file($src_path, $dest_path);

                    /// CHeck whether the image is uploaded or not
                    if ($upload == false) {
                        //FAiled to Upload
                        $_SESSION['upload'] = "<div class='message-error'>Failed to Upload new Image.
                        <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                        </div>";
                        //REdirect to Manage Food 
                        header('location:' . SITEURL . 'profile.php');
                        //Stop the Process
                        die();
                    }
                    //3. Remove the image if new image is uploaded and current image exists
                    //B. Remove current Image if Available
                    if ($current_image != "") {
                        //Current Image is Available
                        //REmove the image
                        $remove_path = "img/" . $current_image;

                        $remove = unlink($remove_path);

                        //Check whether the image is removed or not
                        if ($remove == false) {
                            //failed to remove current image
                            $_SESSION['remove-failed'] = "<div class='message-error'>Failed to remove current image.
                            <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                            </div>";
                            //redirect to manage food
                            header('location:' . SITEURL . 'admin/manage-food.php');
                            //stop the process
                            die();
                        }
                    }
                } else {
                    $image_name = $current_image; //Default Image when Image is Not Selected
                }
            } else {
                $image_name = $current_image; //Default Image when Button is not Clicked
            }



            //4. Update the Food in Database
            $sql3 = "UPDATE portfolio SET 
                     title = '$title',
                    `text` = '$description',
                    client = '$client',
                    image = '$image_name',
                    category = $category,
                    skills = $skills,
                    project_date = '$date',
                    url = '$url'
                    WHERE id=$id
                ";

            //Execute the SQL Query
            $res3 = mysqli_query($conn, $sql3);

            //CHeck whether the query is executed or not 
            if ($res3 == true) {
                //Query Exectued and Food Updated
                $_SESSION['update'] = "<div class='message'>Project Updated Successfully
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i>
                </div>";
                header('location:'.SITEURL.'project.php');
            } else {
                //Failed to Update Food
                $_SESSION['update'] = "<div class='message-error'>Failed to Update Project
                <i class='fas fa-times' onclick='this.parentElement.remove();'></i></div>";
                header('location:'.SITEURL.'project.php');
            }
        }
        ob_end_flush();  
        ?>


                            
      