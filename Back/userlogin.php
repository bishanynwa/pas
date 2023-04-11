<?php

// Include the database connection file
include 'conn.php';

// Check if the form was submitted
if (isset($_POST['login'])) {

    // Get the email and password inputs from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the employee table for a matching email and password
    $employee_query = "SELECT * FROM employee WHERE email = '$email' AND password = '$password'";
    $employee_result = mysqli_query($conn, $employee_query);

    // Query the employer table for a matching email and password
    $employer_query = "SELECT * FROM employer WHERE email = '$email' AND password = '$password'";
    $employer_result = mysqli_query($conn, $employer_query);

    // Check if the employee login was successful
    if (mysqli_num_rows($employee_result) > 0) {
        // Employee login was successful
        $employee_data = mysqli_fetch_assoc($employee_result);

        // Redirect to the employee dashboard page
        header('Location: Performance%20Appraisal%20System/Front/employersetup.php');
        exit();
    }

    // Check if the employer login was successful
    if (mysqli_num_rows($employer_result) > 0) {
        // Employer login was successful
        $employer_data = mysqli_fetch_assoc($employer_result);

        // Redirect to the employer dashboard page
        header('Location: Performance%20Appraisal%20System/Front/employersetup.php');
        exit();
    }

    // Login failed, display error message
    echo "Invalid email or password.";
}
?>