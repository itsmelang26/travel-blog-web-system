<?php
// header.php (include only navbar markup to avoid duplicate document structure)
?>
<style>
  /* Navbar Styling */
  .navbar {
    background: #001f5b;
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    position: sticky;
    top: 0;
    z-index: 1000;
  }

  .navbar .logo {
    font-size: 1.5rem;
    font-weight: bold;
    letter-spacing: 2px;
  }

  .navbar ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
  }

  .navbar ul li {
    display: inline;
  }

  .navbar ul li a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
  }

  .navbar ul li a:hover {
    background: white;
    color: #001f5b;
  }

  .navbar ul li a.logout {
    background: crimson;
    padding: 8px 14px;
  }

  .navbar ul li a.logout:hover {
    background: darkred;
    color: white;
  }
</style>
<!-- Navbar -->
<nav class="navbar">
  <div class="logo">PILIPINAS</div>
  <ul>
    <li><a href="../pages/dashboard.php">Home</a></li>
    <li><a href="../pages/discover-philippines.php">Discover Philippines</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="../logout.php" class="logout">Logout</a></li>
  </ul>
</nav>
