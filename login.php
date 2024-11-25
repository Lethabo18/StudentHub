<?php
session_start();

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "studenthub_db";

// Establish a connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check if the email exists in the database
  $query = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if ($user && password_verify($password, $user['password'])) {
    // Password is correct; start a session
    $_SESSION['user'] = $user['email']; // Store user email in session
    header("Location: index.php"); // Redirect to the homepage or dashboard
    exit();
  } else {
    // Message for Invalid email or password
    echo "<p style='color:red;'>Invalid email or password. Please try again.</p>";
  }

  $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | StudentHub</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-image: url('cover page.PNG');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

  }

  .container {
    background-color: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(8px);
    padding: 20px;
    border-radius: 10px;
    color: white;
    width: 50%;
    margin: 0 auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    box-shadow: 0 0 10px rgb(223, 10, 10);
  }

  .form-control {
    margin-bottom: 15px;
  }

  .form-control label {
    display: block;
    margin-bottom: 5px;
  }

  .form-control input {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
  }

  .form-control button {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
  }

  .form-control button:hover {
    background-color: #007bff;
  }

  .toggle {
    text-align: center;
    margin-top: 20px;
  }

  .toggle a {
    text-decoration: none;
    color: #007BFF;
    font-size: 20px;
    font-weight: bold;
  }

  .toggle a:hover {
    text-decoration: underline;
  }
</style>

<body>
  <div class="container">
    <h2>Login to StudentHub</h2>
    <form action="login.php" method="POST">
      <div class="form-control">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>
      <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">
      </div>
      <div class="form-control">
        <button type="submit">Login</button>
      </div>
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
  </div>
</body>

</html>