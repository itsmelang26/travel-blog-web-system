<?php
require_once __DIR__ . "/db.php"; // safer absolute path

// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
/**
 * Register a new user
 */
function registerUser(string $username, string $password, string $email = null) {
    global $pdo;

    // Check if username exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        return "Username already taken.";
    }

    // If email provided, check uniqueness
    if (!empty($email)) {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return "Email already registered.";
        }
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user (email can be NULL)
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->execute([$username, $hashedPassword, $email]);

    return true;
}

/**
 * Login with username + password
 */
function loginUser(string $username, string $password) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Secure session handling
        session_regenerate_id(true);

        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $user['username'];

        return $user; // return user row if success
    }

    return false;
}

/**
 * Get user by ID
 */
function getUserById(int $id) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Check login status
 */
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

/**
 * Logout and destroy session
 */
function logoutUser() {
    // Clear session
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();

    // Clear any "remember me" cookie
    setcookie("remember_token", "", time() - 3600, "/");

    header("Location: /ParadiseEscape/index.php");
    exit;
}
