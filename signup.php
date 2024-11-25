<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash password in terms of security

  // Check if the email is already registered
  $checkQuery = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($checkQuery);

  if (!$stmt) {
    die("Prepare statement failed: " . $conn->error);
  }

  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<p style='color:red;'>Email is already registered. Please use a different email.</p>";
  } else {
    // Insert the new user into the database
    $insertQuery = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);

    if (!$stmt) {
      die("Prepare statement failed: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
      echo "<p style='color:green;'>Sign up successful! You can now <a href='login.php'>log in</a>.</p>";
    } else {
      echo "<p style='color:red;'>Error: Could not create account.</p>";
    }
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
  <title>Sign Up | StudentHub</title>
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
    <h2>Sign Up for StudentHub</h2>
    <form action="signup.php" method="POST">
      <div class="form-control">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email">
      </div>
      <div class="form-control">
        <label for="School name">School name</label>
        <input type="School name" id="School name" name="School name" required placeholder="Enter your School name">
      </div>
      <div class="form-control">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Enter your password">
      </div>
      <div class="form-control">
        <button type="submit">Sign Up</button>
      </div>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>

  </div>
</body>

</html>