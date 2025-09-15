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
    <title>Dashboard - Paradise Escape</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <?php include "../includes/header.php"; ?>
<p>Place your DASHBOARD CODE HERE!</p>
</body>
</html>
