<?php

$conn = mysqli_connect('localhost','root','','portfoliomain') or die('connection failed');

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact_form` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact_form`(name, email, number, message) VALUES('$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> -->
</head>


<body style="background-color: #dad7dc;">
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message" data-aos="zoom-out">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
    <div class="loader loader--active">
        <div class="loader__tile"></div>
        <div class="loader__tile"></div>
        <div class="loader__tile"></div>
        <div class="loader__tile"></div>
        <div class="loader__tile"></div>
    </div>
    <header>
        <input type="checkbox" name="" id="nav-toggler" class="fas fa-bars">
        <a href="index.php">
            <div class="logo" style="color: #1b1e1c;">Prazol Malla</div>
        </a>
        <nav class="navbar">
            <a href="index.php" data-text="home">home </a>
            <a href="about.php" data-text="about">about </a>
            <a href="portfolio.php" data-text="portfolio">portfolio </a>
            <a href="contact.php" data-text="contact">contact </a>
            <div class="background-img"></div>
        </nav>
    </header>
    <br>
    <br>
    <section class="contact" id="contact">
        <h1 class="sec-title">Contact <span>Me</span></h1>
        <form action="#" method="post">
            <div class="flex">
                <input data-aos="fade-right" type="text" name="name" placeholder="enter your name" class="box" required>
                <input data-aos="fade-left" type="email" name="email" placeholder="enter your email" class="box"
                    required>
            </div>
            <input data-aos="fade-up" type="number" min="0" name="number" placeholder="enter your number" class="box"
                required>
            <textarea data-aos="fade-up" name="message" class="box" required placeholder="enter your message" cols="30"
                rows="10"></textarea>
            <input type="submit" data-aos="zoom-in" value="send message" name="send" class="btn">
        </form>

        <div class="box-container">

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-phone"></i>
                <h3>phone</h3>
                <p>+977 9849712430</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-envelope"></i>
                <h3>email</h3>
                <p>prajwalmalla16@gmail.com</p>
            </div>

            <div class="box" data-aos="zoom-in">
                <i class="fas fa-map-marker-alt"></i>
                <h3>address</h3>
                <p>Kathmandu, Nepal </p>
            </div>

        </div>

    </section>

    <!-- contact section ends -->
    <script src="js/main.js"></script>
</body>
<footer>
    <br>
    <hr style="color: black;">
    <div class="social">
        <div class="circle">
            <a href="#" target="_blank"><i class="fa-brands fa-facebook social-icon"></i></a>
        </div>
        <div class="circle">
            <a href="#" target="_blank"><i class="fa-brands fa-instagram social-icon"></i></a>
        </div>
        <div class="circle">
            <a href="#" target="_blank"><i class="fa-brands fa-github social-icon"></i></a>
        </div>
        <div class="circle">
            <a href="#" target="_blank"><i class="fa-brands fa-behance social-icon"></i></a>
        </div>
    </div>
    <div>
        <p>2023 Prazol Malla. All Rights Reserved.</p>
    </div>
</footer>

</html>