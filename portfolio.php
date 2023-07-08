<?php include 'include/config.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/glightbox/css/glightbox.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

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
            <div class="logo" style="color: #1b1e1c;">Prazol Malla</div>
        </a>
        <nav class=" navbar">
            <a href="index.php" data-text="home">home </a>
            <a href="about.php" data-text="about">about </a>
            <a href="portfolio.php" data-text="portfolio">portfolio </a>
            <a href="contact.php" data-text="contact">contact </a>
            <div class="background-img"></div>
        </nav>
    </header>
    <br>
    <br>
    <section id="portfolio" class="portfolio">
    <div class="container">

    <div class="container">
            <h1 class="sec-title">Our <span>Work</span></h1>
            <h3 class="secondary-title">What have we got in store for you?</h3>
        </div>
      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <?php
              $cat_list = "SELECT * FROM `category`";
              $cat_result = mysqli_query($con, $cat_list);
              if($cat_result -> num_rows > 0){
                while($cat_data = $cat_result -> fetch_assoc()){
                  ?>
                  <li data-filter=".<?php echo $cat_data['name']?>"><?php echo $cat_data['name']?></li>
                  <?php
                }
              }
            ?>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        <?php
          $portfolio = "SELECT * FROM `portfolio`";
          $portfolio_result = mysqli_query($con, $portfolio);

          if($portfolio_result -> num_rows > 0){
            while($portfolio_data = $portfolio_result->fetch_assoc()){
              $category = $portfolio_data['category'];
                $category_sql = "SELECT * FROM `category` WHERE `category`.`id`='$category'";
                $category_result = mysqli_query($con, $category_sql);
                $category_data = mysqli_fetch_assoc($category_result);
              ?>
                <div class="col-lg-4 col-md-6 portfolio-item <?=$category_data['name']?>">
                  <div class="portfolio-wrap">
                    <img src="img/<?=$portfolio_data['image']?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4><?=$portfolio_data['title']?></h4>
                      <p><?=$category_data['name']?></p>
                      <div class="portfolio-links">
                        <a href="img/<?=$portfolio_data['image']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $portfolio_data['title']?>"><i class="fa-solid fa-plus"></i></a>
                        <a href="portfolio-details.php?id=<?php echo $portfolio_data['id']?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details">
                        <i class="fa-solid fa-link"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
            }
          }
          else{
            echo "NO Portfolio Found.";
          }
        ?>
      </div>

    </div>
  </section><!-- End Portfolio Section -->
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/glightbox/js/glightbox.min.js"></script>
  <script src="assets/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/swiper/swiper-bundle.min.js"></script>
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