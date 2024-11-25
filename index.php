<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.php");
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style/styles.css" />
  <title>Web Development | StudentHub</title>
</head>

<body>
  <nav>
    <div class="nav__header">
      <div class="nav__logo">
        <a href="#" class="logo">StudentHub</a>
      </div>
      <div class="nav__menu__btn" id="menu-btn">
        <i class="ri-menu-line"></i>
      </div>
    </div>
    <ul class="nav__links" id="nav-links">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="products.php">Products</a></li>
      <?php if (isset($_SESSION['user'])): ?>
        <li><a href="logout.php">Log Out</a></li>
      <?php else: ?>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>


  <header class="section__container header__container" id="home">
    <div class="header__image">
      <img src="background.PNG" alt="header" />
    </div>
    <div class="header__content">
      <div>
        <h1>We Help You Shape Your Future.</h1>
        <p>
          We will help you sell your unused products and buy new products that you need with affordable prices.
        </p>
      </div>
    </div>
  </header>

  <section class="section__container deals__container">
    <div class="deals__card">
      <h2 class="section__header">Hot 🔥 deals for you</h2>
      <p>Online shopping for student products sales direct to consumers</p>
    </div>
    <div class="deals__card">
      <span><i class="ri-cash-line"></i></span>
      <h4>1.5% cashback</h4>
      <p>Earn a 5% cashback reward on every product purchase you make!</p>
    </div>
    <div class="deals__card">
      <span><i class="ri-calendar-schedule-line"></i></span>
      <h4>30 day terms</h4>
      <p>
        Take advantage of our 30-day payment terms, completely interest-free!
      </p>
    </div>
    <div class="deals__card">
      <span><i class="ri-money-rupee-circle-line"></i></span>
      <h4>Save money</h4>
      <p>
        Discover unbeatable prices and save big money when you sell your books.
      </p>
    </div>
  </section>

  <section class="section__container about__container" id="about">
    <div class="about__header">
      <div>
        <h2 class="section__header">About us</h2>
        <p class="section__description">
          Student with an unused textbook can easily find another student who needs it.
          The goal is to eliminate the barriers in student-to-student transactions,
          making the process smooth and user-friendly.
        </p>
      </div>
      <button class="about__btn">Learn More</button>
    </div>
    <div class="about__content">
      <div class="about__image">
        <img src="pic6.PNG" alt="about" />
      </div>
      <div class="about__grid">
        <div class="about__card">
          <h3>1.</h3>
          <h4>Who we are</h4>
          <p>
            We help student shape their future. You get a 2-week free trail to kick your career.
          </p>
        </div>
        <div class="about__card">
          <h3>2.</h3>
          <h4>What do we do</h4>
          <p>
            We give you discounts when you buy and sell you products.
          </p>
        </div>
        <div class="about__card">
          <h3>3.</h3>
          <h4>How do we help</h4>
          <p>Use our conatact information to get more books to help you shape your future career.</p>
        </div>
        <div class="about__card">
          <h3>4.</h3>
          <h4>Create success story</h4>
          <p>
            With access to online learning resources anyone can transform.
          </p>
        </div>
      </div>
    </div>
  </section>

  <button onclick="window.location.href='products.php'">View Products</button>

  <section class="section__container client__container">
    <div class="client__content">
      <h2 class="section__header">What our happy client say</h2>
      <p class="section__description">
        Testimonials Highlighting Our Commitment to Quality, Exceptional
        Service, and Customer Satisfaction
      </p>

      <div class="swiper">

        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="client__card">
              <img src="happy.PNG" alt="user" />
              <div>
                <p>
                  StudentHub transformed my educational experience with their beautiful
                  and affordable study materials. The 5% cashback was a delightful
                  bonus!
                </p>
                <h4>Dan Sam</h4>
                <h5>IT Student</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <footer class="footer" id="contact">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="footer__logo">
          <a href="#" class="logo">StudentHub</a>
        </div>
        <p>
          Join us in transforming your education with valuable study materials that will help you shape your future.
        </p>
        <ul class="footer__socials">
          <li>
            <a href="#"><i class="ri-facebook-fill"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-twitter-fill"></i></a>
          </li>
          <li>
            <a href="#"><i class="ri-linkedin-fill"></i></a>
          </li>

        </ul>
      </div>
      <div class="footer__col">
        <h4>Services</h4>
        <ul class="footer__links">
          <li><a href="#">Contact Us</a></li>
          <li><a href="#">Library</a></li>
          <li><a href="#">Help Center</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Resources</h4>
        <ul class="footer__links">
          <li><a href="#">Pricing</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Contact Support</a></li>
          <li><a href="#">Privacy Policy</a></li>
          <li><a href="#">T's & c's</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>Support</h4>
        <ul class="footer__links">
          <li><a href="#">Contact</a></li>
          <li><a href="#">Sitemap</a></li>
          <li><a href="#">Cancelation Policy</a></li>
          <li><a href="#">Security</a></li>
        </ul>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2024 StudentHub. All rights reserved.
    </div>
  </footer>

  <script>
    document.getElementById('menu-btn').addEventListener('click', () => {
      const navLinks = document.getElementById('nav-links');
      navLinks.classList.toggle('open');
    });
  </script>
  <script>
    function showSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'flex'
    }

    function hideSidebar() {
      const sidebar = document.querySelector('.sidebar')
      sidebar.style.display = 'none'
    }
  </script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="main.js"></script>


</body>

</html>