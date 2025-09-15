<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

// Include auth functions
require_once '../src/auth.php';

// Fetch user by ID
$user = getUserById($_SESSION['user_id']);
if (!$user) {
    // Invalid user, logout
    session_destroy();
    header('Location: ../index.php');
    exit;
}

?>





 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pilipinas</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Global Styles */
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #f8f8f8;
      color: #222;
    }
    header {
      background: #001f5c;
      color: rgb(216, 128, 204);
      padding: 15px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      margin: 0;
      font-size: 24px;
    }
    nav a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    nav a:hover {
      border-bottom: 2px solid white;
    }

    /* Carousel Styles */
    .carousel {
      position: relative;
      max-width: 1000px;
      margin: 40px auto;
      overflow: hidden;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      background: white;
    }
    .slides {
      display: flex;
      transition: transform 0.30s ease-in-out;
    }
    .slide {
      min-width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px;
    }
    .slide img {
      width: 20%;
      border-radius: 10px;
    }
    .content {
      width: 100%;
      padding: 100px;
    }
    .content h2 {
      margin-top: 0;
      color: #111;
    }

    /* Navigation buttons */
    .prev, .next {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 20px;
      color: white;
      background: rgba(0,0,0,0.5);
      padding: 10px;
      border-radius: 50%;
      cursor: pointer;
      user-select: none;
    }
    .prev { left: 10px; }
    .next { right: 10px; }

    /* Dots */
    .dots {
      text-align: center;
      margin: 10px 0;
    }
    .dot {
      height: 12px;
      width: 12px;
      margin: 0 5px;
      background: #bbb;
      border-radius: 50%;
      display: inline-block;
      cursor: pointer;
    }
    .active {
      background: #001f5c;
    }

    /* Responsive */
    @media (max-width: 1000px) {
      .slide {
        flex-direction: column;
      }
      .slide img {
        width: 80%;
      }
      .content {
        width: 800%;
        text-align: center;
      }
    }
  </style>
</head>
<body>
     <?php include "../includes/header.php"; ?>
  <!-- Carousel -->
  <div class="carousel">
    <div class="slides">
      <!-- Slide 1 -->
      <div class="slide">
        <img src="../sisig.jpg" alt="Sisig">
        <div class="content">
          <h2>SISIG</h2>
          <p>Sisig is a Filipino dish made from pork jowl and ears, pork belly, and chicken liver, 
            usually seasoned with calamansi, onions, and chili peppers. It originates from Pampanga and is a staple of Kapampangan cuisine.</p>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="slide">
        <img src="../sinigang.jpg" alt="Sinigang">
        <div class="content">
          <h2>SINIGANG</h2>
          <p>Sinigang is a Filipino soup or stew characterized by its sour and savory taste. It is most often associated with tamarind but can use other sour fruits such as unripe mangoes or vinegar.</p>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="slide">
        <img src="../adobo.jpg" alt="Adobo">
        <div class="content">
          <h2>ADOBO</h2>
          <p>Philippine adobo is a popular dish and cooking process in Philippine cuisine. 
            Meat or seafood is browned, then marinated and simmered in vinegar, soy sauce, 
            and garlic.</p>
        </div>
      </div>
      <!-- Slide 4 -->
      <div class="slide">
        <img src="../chocolate.jpg" alt="Chocolate Hills">
        <div class="content">
          <h2>CHOCOLATE HILLS</h2>
          <p>Bohol is one of the most popular tourist destinations in the Philippines, 
            attracting visitors worldwide with its Chocolate Hills and natural beauty.</p>
        </div>
      </div>
      <!-- Slide 5 -->
      <div class="slide">
        <img src="../mayon.jpg" alt="Mayon Volcano">
        <div class="content">
          <h2>MAYON VOLCANO</h2>
          <p>Located in Luzon, Mayon Volcano is famous for its perfect cone shape and stands at 2,462 meters. It has inspired legends and art throughout history.</p>
        </div>
      </div>
      <!-- Slide 6 -->
      <div class="slide">
        <img src="../boracay.jpg" alt="Boracay Island">
        <div class="content">
          <h2>BORACAY ISLAND</h2>
          <p>Boracay is famous for its white sandy beaches, crystal-clear waters, and vibrant nightlife. Located in the Western Visayas, it is a world-renowned tourist destination.</p>
        </div>
      </div>
    </div>
    <!-- Controls -->
    <a class="prev">&#10094;</a>
    <a class="next">&#10095;</a>
    <div class="dots"></div>
  </div>

  <script>
    // JavaScript for carousel functionality
    const slides = document.querySelector('.slides');
    const slideItems = document.querySelectorAll('.slide');
    const totalSlides = slideItems.length;
    let index = 0;

    const dotsContainer = document.querySelector('.dots');
    for (let i = 0; i < totalSlides; i++) {
      const dot = document.createElement('span');
      dot.classList.add('dot');
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => moveToSlide(i));
      dotsContainer.appendChild(dot);
    }
    const dots = document.querySelectorAll('.dot');

    function updateDots() {
      dots.forEach(dot => dot.classList.remove('active'));
      dots[index].classList.add('active');
    }

    function moveToSlide(i) {
      index = i;
      slides.style.transform = `translateX(${-index * 100}%)`;
      updateDots();
    }

    document.querySelector('.prev').addEventListener('click', () => {
      index = (index - 1 + totalSlides) % totalSlides;
      moveToSlide(index);
    });

    document.querySelector('.next').addEventListener('click', () => {
      index = (index + 1) % totalSlides;
      moveToSlide(index);
    });

    // Auto Slide
    setInterval(() => {
      index = (index + 1) % totalSlides;
      moveToSlide(index);
    }, 5000);
  </script>
</body>
</html>
