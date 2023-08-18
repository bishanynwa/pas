<?php

// Include the database connection file
include 'conn.php';

var_dump($_POST['password']);

// Check if the form was submitted
if (isset($_POST['email']) && isset( $_POST['password']) && !empty($_POST['email']) && !empty( $_POST['password'])) {

    // Get the email and password inputs from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // print_r($_POST);

    // Query the employee table for a matching email and password
    $employee_query = "SELECT * FROM users WHERE email_id = '$email' AND password = '$password'";
    $employee_result = mysqli_query($conn, $employee_query);

    // Check if the employee login was successful
    if (mysqli_num_rows($employee_result) > 0) {
        // Employee login was successful
        // $employee_data = mysqli_fetch_assoc($employee_result);

        // Redirect to the employee dashboard page
        // header('Location: Front\dashboard.php');
        echo"success";
        exit();
    }

    // Check if the employer login was successful
    if (mysqli_num_rows($employee_result) > 0) {
        // Employer login was successful
        $employee_result = mysqli_fetch_assoc($employee_result);

        // Redirect to the employer dashboard page
        // header('Location: Front\dashboard.php');
        echo"success";
        exit();
    }

    // Login failed, display error message
    echo "Invalid email or password.";
}
?>