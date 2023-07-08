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
                <!-- <a href="#"><button class="btn">Read More</button></a> -->
            </div>
        </div>
        <div class="skills" data-aos="fade-up">

            <h1 class="heading"> <span>skills</span> </h1>

            <div class="progress">
                <div class="bar" data-aos="fade-left">
                    <h3><span>HTML</span> <span>95%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>CSS</span> <span>80%</span></h3>
                </div>
                <div class="bar" data-aos="fade-left">
                    <h3><span>JavaScript</span> <span>65%</span></h3>
                </div>
                <div class="bar" data-aos="fade-right">
                    <h3><span>PHP</span> <span>50%</span></h3>
                </div>
            </div>

        </div>


    </section>
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