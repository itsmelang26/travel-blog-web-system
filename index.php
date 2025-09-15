<?php
session_start();
require_once __DIR__ . '/src/config.php';
require_once __DIR__ . '/src/db.php';
require_once __DIR__ . '/src/auth.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // LOGIN
    if (isset($_POST['login'])) {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if ($username && $password) {
            $user = loginUser($username, $password);

            if ($user) {
                header('Location: pages/dashboard.php');
                exit;
            } else {
                $error = "Invalid username or password.";
            }
        } else {
            $error = "Please fill in both fields.";
        }
    }

    // REGISTER
    elseif (isset($_POST['register'])) {
        $username         = trim($_POST['username'] ?? '');
        $password         = trim($_POST['password'] ?? '');
        $confirm_password = trim($_POST['confirm_password'] ?? '');

        if ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } elseif (strlen($username) < 3) {
            $error = "Username must be at least 3 characters.";
        } elseif (strlen($password) < 6) {
            $error = "Password must be at least 6 characters.";
        } else {
            $result = registerUser($username, $password);

            if ($result === true) {
                $success = "Registration successful. You can now log in.";
            } else {
                $error = $result; // returns error message string
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ParadiseEscape — Login / Register</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body style="background-image: url('images/10223.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">

  <div class="wrap">
    <div class="card">
      <h1 class="title">Login</h1>

      <?php if (!empty($error)): ?>
        <div class="msg error"><?= htmlspecialchars($error) ?></div>
      <?php endif; ?>
      <?php if (!empty($success)): ?>
        <div class="msg success"><?= htmlspecialchars($success) ?></div>
      <?php endif; ?>

      <div class="toggles">
        <button id="btn-login" class="toggle active">Login</button>
        <button id="btn-register" class="toggle">Register</button>
      </div>

      <!-- Login Form -->
      <form id="form-login" method="post" autocomplete="off">
        <div class="field"><input name="username" type="text" placeholder="Username" required></div>
        <div class="field"><input name="password" type="password" placeholder="Password" required></div>
        <div class="row">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" name="login" class="primary">Login</button>
      </form>

      <!-- Register Form -->
      <form id="form-register" method="post" class="hidden" autocomplete="off">
        <div class="field"><input name="username" type="text" placeholder="Username" required></div>
        <div class="field"><input name="password" type="password" placeholder="Password" required></div>
        <div class="field"><input name="confirm_password" type="password" placeholder="Confirm Password" required></div>
        <button type="submit" name="register" class="primary">Register</button>
      </form>

      <p style="margin-top:14px;color:rgba(255,255,255,0.9)">
        Don’t have an account?
        <button id="open-register" style="background:none;border:none;color:#fff;text-decoration:underline;cursor:pointer">Register</button>
      </p>
    </div>
  </div>

  <script>
    const btnLogin = document.getElementById('btn-login');
    const btnRegister = document.getElementById('btn-register');
    const formLogin = document.getElementById('form-login');
    const formRegister = document.getElementById('form-register');
    const openRegister = document.getElementById('open-register');
    const title = document.querySelector('.title');

    btnLogin.addEventListener('click', ()=> {
      formLogin.classList.remove('hidden');
      formRegister.classList.add('hidden');
      btnLogin.classList.add('active');
      btnRegister.classList.remove('active');
      title.textContent = 'Login';
    });
    btnRegister.addEventListener('click', ()=> {
      formRegister.classList.remove('hidden');
      formLogin.classList.add('hidden');
      btnRegister.classList.add('active');
      btnLogin.classList.remove('active');
      title.textContent = 'Register';
    });
    openRegister.addEventListener('click', ()=> btnRegister.click());
  </script>
</body>
</html>
