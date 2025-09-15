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
  <title>Paradise Escape</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    /* Navbar */
    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background: #001f54; /* Dark blue like your screenshot */
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 50px;
      z-index: 1000;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 40px; /* Same realistic size as in your screenshot */
      width: auto;
      margin-right: 10px;
    }

    .logo span {
      font-weight: bold;
      font-size: 18px;
      letter-spacing: 1px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 30px;
    }

    nav ul li {
      display: inline;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: #ffdd57; /* Yellow hover effect */
    }

    /* Hero Section */
    .hero {
      background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://images.unsplash.com/photo-1507525428034-b723cf961d3e") no-repeat center center/cover;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: white;
      padding: 0 20px;
    }

    .hero h1 {
      font-size: 70px;
      font-weight: bold;
      margin-bottom: 20px;
      letter-spacing: 3px;
    }

    .hero h2 {
      font-size: 24px;
      font-style: italic;
      margin-bottom: 20px;
    }

    .hero p {
      font-size: 18px;
      max-width: 700px;
      line-height: 1.6;
    }

    /* Scroll down indicator */
    .scroll-down {
      margin-top: 40px;
      font-size: 16px;
      color: #fff;
      opacity: 0.7;
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-10px);
      }
      60% {
        transform: translateY(-5px);
      }
    }
  </style>
</head>
<body>
  <?php include "../includes/header.php"; ?>
  <!-- Hero Section -->
  <section class="hero">
    <h1>PARADISE ESCAPE</h1>
    <h2>Escape. Explore. Experience paradise!</h2>
    <p>
      Paradise Escape is your gateway to the world’s most breathtaking destinations. From hidden
      beaches and majestic mountains to vibrant cities and cultural wonders, we bring you closer to
      the beauty that makes travel unforgettable.
    </p>
    <div class="scroll-down">▼ Scroll Down ▼</div>
  </section>

</body>
</html>



