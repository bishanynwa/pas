<?php      

        include('conn.php');  
        session_start();
        $username = $_POST['email'];  
        $password = $_POST['password'];  
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
    
         $sql = "SELECT DISTINCT id  ,email_id, password, 'employer' AS role
            FROM employer
            WHERE email_id = '$username' and password = '$password'
            UNION ALL
            SELECT DISTINCT  id ,email_id, password, 'employees' AS role
            FROM employees  
            WHERE email_id = '$username' and password = '$password';";

        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){  
            // $data=mysqli_fetch_assoc($result);
            
            $_SESSION[$row['role']]=$row["id"];
            // echo $row["employeeid"];
            
			$_SESSION['user_id']=$row['id'];

            $_SESSION['user']=$row["email_id"];
            
            $_SESSION['role']=$row["role"];
            header("Location: /Performance%20Appraisal%20System/Front/dashboard.php");
        }else if($count > 1){
            echo "<h1> Login failed. Duplicate data in 2 tables.</h1>";  
        }
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?> 