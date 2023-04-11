<?php
// Include the conn.php file
include 'conn.php';

// Retrieve the email and password submitted from the login form
$email = $_POST['email'];
$password = $_POST['password'];

// Validate the email and password against the admin table in the database
$query = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
  // Login successful, redirect to the admin dashboard
//   header('Location: admin_dashboard.php');
echo"login"; 
} else {
  // Login failed, display an error message
  echo 'Invalid email or password';
}
?>
