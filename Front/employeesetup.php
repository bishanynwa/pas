<?php include 'include.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Style/employerview.css">
</head>
<body>
    <?php 
    
    if(!empty($_GET)){
        if(!empty($_GET['success'])){
            echo"<h1 class=success> Insertion Success</h1>";
        }
        if(!empty($_GET['delete'])){
            echo"<h1 class=deleteS> Removal Success</h1>";
        }
        if(!empty($_GET['update'])){
            echo"<h1 class=updateS> Update Success</h1>";
        }
    }

    ?>
    <div class="table-container">
        <div class="table-header">
            <h2>Employer Information</h2>
            <a class="add-button" href="addemployee.php">Add Employee</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID:</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Superior</th>
                    <th>Phone Number</th>
                    <th>Email ID</th>
            
                </tr>
            </thead>
            <tbody>
                <?php
                include"../Back/conn.php";
                $sql="SELECT * FROM employees";
                $res= mysqli_query( $conn, $sql);
                if(mysqli_num_rows($res)>0){
                    $ID=1;
                    while($row=mysqli_fetch_assoc($res)){
                        echo "<tr>";
                        echo "<td>".$ID."</td>";
                        echo "<td>".$row['first_name']."</td>";
                        echo "<td>".$row['middle_name']."</td>";
                        echo "<td>".$row['last_name']."</td>";
                        echo "<td>".$row['employer_id']."</td>";
                        echo "<td>".$row['phone_number']."</td>";
                        echo "<td>".$row['email_id']."</td>";
                     
                        echo "</tr>";
                        $ID++;
                    }
                }
                else{
                    echo"Error 404 not found";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
