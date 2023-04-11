

<?php


$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$lastname=$_POST['lastname'];
$employer_id = $_POST["superior"];
$phonenumber=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];

include "conn.php";

$sql = "INSERT INTO `employees` ( `first_name`, `middle_name`, `last_name`, `phone_number`, `email_id`, `employer_id`, `password`) 
VALUES ( '$firstname', '$middlename', '$lastname', '$phonenumber', '$email', '$employer_id', '$password');";

$res= mysqli_query( $conn, $sql);

if(!$res){
    die("failed insertion".mysqli_error($conn));
}

else{
header('location:../Front/employeesetup.php');
echo'<script  type="text/javascript"> alert("Sign Up Succesfull")</script>';
  
}

 ?>