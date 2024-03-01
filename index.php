<?php

$myfile = fopen("test.txt", "r");
if (filesize("test.txt") != 0) {
  $text = fread($myfile, filesize("test.txt"));
  if ($text != "") {
    $_SESSION['Text'] = $text;
  }
  fclose($myfile);
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="Images/favicon.ico" type="image/x-icon" />
  <title>Viswateja School</title>
  <!-- Controlling Cache -->
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <!-- Links for Header -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

  <!-- Links for Carousel -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<style>
  /* Google Fonts Import Link */
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  body {
    background-color: lightblue;
  }

  /* Header */
  nav {
    display: flex;
    height: 80px;
    width: 100%;
    background: #1b1b1b;
    align-items: center;
    justify-content: space-evenly;
    flex-wrap: wrap;
  }

  nav .heading {
    color: #fff;
    font-size: large;
  }

  nav ul {
    display: flex;
    flex-wrap: wrap;
    list-style: none;
  }

  nav ul li {
    margin: 0 5px;
    position: relative;
  }

  nav ul li a {
    color: #f2f2f2;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
    padding: 8px 15px;
    border-radius: 5px;
    letter-spacing: 1px;
    transition: all 0.3s ease;
  }

  nav ul li a.active,
  nav ul li a:hover {
    color: #111;
    background: #fff;
    text-decoration: none;
  }

  nav .menu-btn i {
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    display: none;
  }

  input[type="checkbox"] {
    display: none;
  }

  /* New */
  nav ul li .sub-menu {
    width: max-content;
    position: absolute;
    top: 35px;
    left: 0;
    background: #1b1b1b;
    padding: 0 0 10px 0;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
    border-radius: 0 0 4px 4px;
    display: none;
    z-index: 20;
  }

  nav ul li:hover .login-sub-menu {
    display: block;
  }

  ul li .sub-menu li {
    padding: 10px 0 0 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  }

  ul li .sub-menu a {
    color: #fff;
    font-size: 15px;
    font-weight: 500;
  }
  
  @media screen and (max-width:390px) {
    .heading h3{
      font-size: medium !important;
    }
  }

  @media (max-width: 920px) {
    nav .logo {
      font-size: 20px;
    }

    nav .logo img {
      width: 50px;
    }

    nav .menu-btn i {
      display: block;
    }

    nav ul {
      position: fixed;
      top: 80px;
      left: -100%;
      background: #111;
      height: 100vh;
      width: 100%;
      text-align: center;
      display: block;
      transition: all 0.3s ease;
      z-index: 20;
    }

    #click:checked~ul {
      left: 0;
    }

    nav ul li {
      width: 100%;
      margin: 20px 0;
    }

    nav ul li a {
      width: 100%;
      margin-left: -100%;
      display: block;
      font-size: 20px;
      transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    #click:checked~ul li a {
      margin-left: 0px;
    }

    nav ul li a.active,
    nav ul li a:hover {
      background: none;
      color: cyan;
    }

    nav ul li .sub-menu {
      left: 80px;
    }

    ul li .sub-menu li {
      padding: 0 100px 0 0;
      margin-left: 30px;
    }
  }

  /* Carousel */
  .carousel-holder {
    padding: 20px;
    padding-top: 0;
  }

  .carousel-item img {
    border-radius: 10px;
  }

  marquee {
    padding-left: 10%;
  }

  @media (max-width: 920px) {
    marquee {
      padding-left: 0;
    }
  }

  .icon {
    animation: blink 0.3s infinite ease-in;
  }

  @keyframes blink {
    0% {
      opacity: 1;
    }

    100% {
      opacity: 0;
    }
  }

  /* Footer */
  footer {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: auto;
    width: 98.9vw;
    padding-top: 40px;
    color: #fff;
  }

  .footer-bottom {
    background: #000;
    width: 98.9vw;
    padding: 20px;
    padding-bottom: 40px;
    text-align: center;
  }

  .footer-bottom p {
    float: left;
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
  }

  .footer-bottom p a {
    color: #44bae8;
    font-size: 16px;
    text-decoration: none;
  }

  .footer-menu {
    float: right;

  }

  .footer-menu ul {
    display: flex;
  }

  .footer-menu ul li {
    padding-right: 10px;
    display: block;
  }

  .footer-menu ul li a {
    color: #cfd2d6;
    text-decoration: none;
  }

  .footer-menu ul li a:hover {
    color: #27bcda;
  }

  @media (min-width:500px) {
    footer {
      top: 105%;
    }
  }
  @media (max-width:768px) {
    footer,.footer-bottom{
      width: 100vw;
    }
  }

  @media (max-width:500px) {
    footer {
      background: #111;
    }

    .footer-menu ul {
      display: flex;
      margin-top: 10px;
      margin-bottom: 20px;
    }
  }

  .company-tag {
    padding-top: 3px;
    float: right !important;
  }

  @media (min-width:500px) {
    .company-tag {
      margin-left: 15%;
    }
  }
</style>

<body>
  <!-- Header -->
  <nav>
    <div class="logo">
      <img src="Images/Viswateja Logo.png" alt="..." width="70px" />
    </div>
    <div class="heading">
      <h3>Viswateja School, Duttalur</h3>
    </div>
    <input type="checkbox" id="click" />
    <label for="click" class="menu-btn">
      <i class="fas fa-bars"></i>
    </label>
    <ul>
      <li><a class="active" href="index.php">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="Gallery/gallery.html">Gallery</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li>
        <a href="#">Login</a>
        <ul class="login-sub-menu sub-menu">
          <li><a href="Admin/admin_login.php">Admin Login</a></li>
          <!--
          <li><a href="Student/student_login.php">Student Login</a></li>
          <li><a href="Faculty/faculty_login.php">Faculty Login</a></li>
          -->
        </ul>
      </li>
    </ul>
  </nav>
  <?php if (isset($_SESSION['Text'])) { ?>
    <div class="container-fluid marquee-container">
      <marquee width="100%" behavior="alternate" scrollamount="12">
        <img src="Images/new.png" alt="..." class="icon" width="50px" />
        <b style="font-family: 'Times New Roman'" id="marquee-text"><?php if (isset($_SESSION['Text'])) {
                                                                      echo $_SESSION['Text'];
                                                                    } ?></b>
      </marquee>
    </div>
  <?php } ?>
  <!-- Carousel -->
  <div class="container-fluid carousel-holder">
    <div class="row">
      <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="border-radius: 10px">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="Images/slides/event1.jpg" alt="First slide" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Images/slides/event2.jpg" alt="Second slide" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Images/slides/event3.jpg" alt="Third slide" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Images/slides/event4.jpg" alt="Fourth slide" />
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="Images/slides/event5.jpg" alt="Fifth slide" />
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?>, <a href="/">Viswateja Schools </a>. All Rights Reserved. </p>
      <p class="company-tag">Developed and Maintained by <u><a href="https://sarathtechgenics.netlify.app" target="_blank">Sarath Techgenics</a></u></p>
      <!-- <div class="footer-menu">
        <ul class="f-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="Gallery/gallery.html">Gallery</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div> -->
    </div>
  </footer>
  <!-- Scripts -->

  <!-- Carousel Interval -->
  <script type="text/javascript">
    $(".carousel").carousel({
      interval: 3000,
    });
  </script>
</body>

</html>