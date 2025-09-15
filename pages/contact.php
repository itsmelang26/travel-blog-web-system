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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact — Paradise Escape</title>
  <link rel="stylesheet" href="../contact.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include "../includes/header.php"; ?>
  <!-- Contact Info -->
  <main class="contact-page">
    
    <section class="contact-info">
      <h1>Contact</h1>
      <p>Email us at: 
        <a href="mailto:touristassistance@tourism.gov.ph">touristassistance@tourism.gov.ph</a>
      </p>
    </section>

    <!-- Guides -->
    <section class="guides">
      <!-- Guide 1 -->
      <div class="guide-card">
        <img src="../ziera.jpg" alt="Ziera Mae M. Papelleras">
        <div class="guide-details">
          <h2>Ziera Mae M. Papelleras</h2>
          <p><strong>The Cultural Enthusiast</strong></p>
          <p>Age: 22</p>
          <p><strong>Specialty:</strong> Historical landmarks, museums, and cultural heritage tours</p>
          <p>Passionate about sharing history and traditions. 
          Knowledgeable about ancient architecture, folk tales, and local art.</p>
          <p><a href="https://www.facebook.com/zieramae.papelleras.9">Facebook</a> | <a href="mailto:zieramaepapelleras@gmail.com">Email</a></p>
        </div>
      </div>

      <!-- Guide 2 -->
      <div class="guide-card">
        <img src="../catherine.jpg" alt="Catherine Sumbilla">
        <div class="guide-details">
          <h2>Catherine Sumbilla</h2>
          <p><strong>The Adventure Seeker</strong></p>
          <p>Age: 22</p>
          <p><strong>Specialty:</strong> Hiking, eco-tours, and outdoor adventures</p>
          <p>Energetic and nature-loving. Guides tourists through mountains, forests, and rivers with both safety and fun.</p>
          <p><a href="https://www.facebook.com/catherine.sumbilla.94">Facebook</a> | <a href="mailto:sumbillacatherine@gmail.com">Email</a></p>
        </div>
      </div>

      <!-- Guide 3 -->
      <div class="guide-card">
        <img src="../merry.jpg" alt="Merry Christine B. Santisas">
        <div class="guide-details">
          <h2>Merry Christine B. Santisas</h2>
          <p><strong>The Food Explorer</strong></p>
          <p>Age: 24</p>
          <p><strong>Specialty:</strong> Local cuisines, food markets, and culinary tours</p>
          <p>Loves introducing tourists to authentic Filipino dishes — from street food to fine dining.</p>
          <p><a href="https://www.facebook.com/baby.kristin.7">Facebook</a> | <a href="mailto:mcsantisas@gmail.com">Email</a></p>
        </div>
      </div>

      <!-- Guide 4 -->
      <div class="guide-card">
        <img src="../Rose.jpg" alt="ROSE ANN D. MOLLANIDA">
        <div class="guide-details">
          <h2>ROSE ANN D. MOLLANIDA</h2>
          <p><strong>The Island Hopper</strong></p>
          <p>Age: 23</p>
          <p><strong>Specialty:</strong> Beaches, island tours, and snorkeling adventures</p>
          <p>Beach lover who guides tourists through stunning islands, lagoons, and coral reefs.</p>
          <p><a href="https://www.facebook.com/rose.mollanida18/">Facebook</a> | <a href="mailto:roseannmollanida@gmail.com">Email</a></p>
        </div>
      </div>

      <!-- Guide 5 -->
      <div class="guide-card">
        <img src="../guide5.jpg" alt="RICA S. PANGELAN">
        <div class="guide-details">
          <h2>RICA S. PANGELAN</h2>
          <p><strong>The Urban Navigator</strong></p>
          <p>Age: 25</p>
          <p><strong>Specialty:</strong> City tours, nightlife, and modern attractions</p>
          <p>Helps visitors experience vibrant city life — from shopping centers to music scenes.</p>
          <p><a href="https://www.facebook.com/ryedump.26minime">Facebook</a> | <a href="mailto:paulramirez@gmail.com">Email</a></p>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
