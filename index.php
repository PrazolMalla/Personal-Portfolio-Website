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

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
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
            <div class="logo">Prazol Malla</div>
        </a>
        <nav class="navbar">
            <a href="index.php" data-text="home">home </a>
            <a href="about.php" data-text="about">about </a>
            <a href="portfolio.php" data-text="portfolio">portfolio </a>
            <a href="contact.php" data-text="contact">contact </a>
            <div class="background-img"></div>
        </nav>
    </header>
    <section class="hero">
        <div class="wrapper">

            <div class="rec">
                <a href="https://github.com/PrazolMalla" target="_blank"><i class="fa-brands fa-facebook social-icon"></i></a>
                <a href="https://github.com/PrazolMalla" target="_blank"><i class="fa-brands fa-instagram social-icon"></i></a>
                <a href="https://github.com/PrazolMalla" target="_blank"><i class="fa-brands fa-github social-icon"></i></a>
                <a href="https://github.com/PrazolMalla" target="_blank"><i class="fa-brands fa-behance social-icon"></i></a>
                <div class="inner-rec"></div>

            </div>
            <div class="content">

                <img src="img/me.jpg" alt="">
                <div class="info">
                    <h3><span class="im">I'm</span> Prazol Malla.
                        A <span class="fd">Frontend Developer & Graphic Designer</span>

                        based in Nepal.
                    </h3>
                    <p class="des">High level experience in web design and development knowledge, producing quality
                        work.
                    </p>
                    <br>
                    <a href="#contact"><button class="btn">Contact Me</button></a>

                </div>
            </div>
        </div>
        <a href="#portfolio">
            <div class="icon-scroll">

            </div>
        </a>


    </section>
    <hr>
    <br>
    <hr style="background-color: black;">
    <section class="portfolio" id="portfolio">
        <div class="container">
            <h1 class="sec-title">Our <span>Work</span></h1>
            <h3 class="secondary-title">What have we got in store for you?</h3>
        </div>

        <div data-aos="fade-right" data-aos-offset="200" data-aos-easing="ease-in-sine" class="grid">
            <div class="item item--medium"></div>
            <div class="item item--large"></div>
            <div class="item item--medium"></div>
            <div class="item item--large"></div>
            <div class="item item--large"></div>
            <div class="item item--medium"></div>

        </div>
        <br>
        <br>
        <a href="portfolio.php"><button class="btn">View More</button></a>

    </section>
    <section class="about" id="about">
        <div class="slide">
            <div class="img">
                <img src="img/me1.jpg" alt="" srcset="">

                <!-- <img src="/img/m2.jpg" alt=""> -->
            </div>
            <div class="title">
                <h1>About Me</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quisquam perspiciatis illum, iure
                    laudantium, voluptate pariatur velit rem, nam nobis unde deleniti numquam beatae porro nisi dolorum
                    quo
                    sunt similique.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quisquam perspiciatis illum, iure
                    laudantium, voluptate pariatur velit rem, nam nobis unde deleniti numquam beatae porro nisi dolorum
                    quo
                    sunt similique.</p>
                <a href="about.php"><button class="btn">Read More</button></a>
            </div>


        </div>
    </section>
    <!-- contact section starts  -->

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
    <script src="https://kit.fontawesome.com/6fd8a997cb.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
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