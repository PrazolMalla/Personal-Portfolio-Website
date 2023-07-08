<?php include 'include/config.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Personal - v4.7.0
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php 

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM `portfolio` WHERE `portfolio`.`id` = $id";
  $result = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($result);

  $category = $data['category'];
  $category_sql = "SELECT * FROM `category` WHERE `category`.`id`='$category'";
  $category_result = mysqli_query($con, $category_sql);
  $category_data = mysqli_fetch_assoc($category_result);

  $skills = $data['skills'];
  $skills_sql = "SELECT * FROM `skills` WHERE `skills`.`id`='$skills'";
  $skills_result = mysqli_query($con, $skills_sql);
  $skills_data = mysqli_fetch_assoc($skills_result);
}

?>
  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div>
                  <img src="img/<?=$data['image']?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

          <div class="col-lg-4 portfolio-info">
            <h3><?=$data['title']?></h3>
            <ul>
              <li><strong>Category</strong>: <?=$category_data['name']?></li>
              <li><strong>Skills</strong>: <?=$skills_data['name']?></li>
              <li><strong>Client</strong>: <?=$data['client']?></li>
              <li><strong>Project date</strong>: <?php echo date('D M Y', strtotime($data['project_date']))?></li>
              <li><strong>Project URL</strong>: <a href="#"><?=$data['url']?></a></li>
            </ul>

            <p>
              <?=$data['text']?>
            </p>
          </div>

        </div>

      </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/glightbox/js/glightbox.min.js"></script>
  <script src="assets/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/swiper/swiper-bundle.min.js"></script>
  

  <!-- Template Main JS File -->
  <script src="js/main.js">

</body>

</html>