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
                    <th>Update</th>
                    <th>Delete</th>
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
                        echo "<td><a class='update' href='javascript:void(0)' onclick='openPopup(".$row['id'].", \"".$row['first_name']."\", \"".$row['middle_name']."\", \"".$row['last_name']."\", \"".$row['employer_id']."\", \"".$row['phone_number']."\", \"".$row['email_id']."\")'>Update</a></td>";
                        echo "<td><a class='delete' href='?delete=".$row['id']."'>Delete</a></td>";
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

    <!-- Popup for updating data -->
    <div class="popup-overlay" id="updatePopup">
        <div class="popup-content">
            <div class="close-btn">
                <a href="#" onclick="closePopup()">Close</a>
            </div>
            <h2>Update Employee</h2>
            <form action="../Back/update_employee.php" method="POST">
                <input type="hidden" name="id" id="updateId">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="updateFirstname" required>
                <label for="middlename">Middle Name:</label>
                <input type="text" name="middlename" id="updateMiddlename">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="updateLastname" required>
                <label for="superior">Superior:</label>
                <input type="text" name="superior" id="updateSuperior">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="updatePhone" required>
                <label for="email">Email ID:</label>
                <input type="email" name="email" id="updateEmail" required>
                <input type="submit" value="Update" name="update">
            </form>
        </div>
    </div>

    <script>
        function openPopup(id, firstname, middlename, lastname, superior, phone, email) {
            // Populate the form fields with the employee details
            document.getElementById('updateId').value = id;
            document.getElementById('updateFirstname').value = firstname;
            document.getElementById('updateMiddlename').value = middlename;
            document.getElementById('updateLastname').value = lastname;
            document.getElementById('updateSuperior').value = superior;
            document.getElementById('updatePhone').value = phone;
            document.getElementById('updateEmail').value = email;

            // Show the updatePopup
            document.getElementById('updatePopup').style.display = 'flex';
        }

        function closePopup() {
            // Hide the updatePopup
            document.getElementById('updatePopup').style.display = 'none';
        }
    </script>
</body>
</html>
