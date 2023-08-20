<!DOCTYPE html>
<html>
<head>
    <title>Employee Setup Form</title>
    <link rel="stylesheet" href="../Style/employeesetup.css">
</head>
<body>
    <?php 
    include 'include.php';
    include '../Back/conn.php';
    $sql = "SELECT * FROM employer";
    $result = mysqli_query($conn, $sql);
    ?>
    <form action="../Back/addemployee.php" method="post" onsubmit="return validateForm();">
        <h2>Add Employee</h2><br/>
        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="middlename">Middle Name:</label>
        <input type="text" id="middlename" name="middlename">

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" name="lastname" required>

        <label for="email">Email Address:</label>
        <input type="text" id="email" name="email" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>

        <label for="superior">Superior:</label>
        <select id="superior" name="superior">
            <option value="">Select a superior</option>
            <?php while ($row = mysqli_fetch_assoc($result)) {?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></option>
            <?php } ?>
        </select>

        <label for="salary">Salary:</label>
        <input type="text" id="salary" name="salary" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Submit">
    </form>
    <script>
        function validateForm() {
            var firstName = document.getElementById("firstname").value;
            var lastName = document.getElementById("lastname").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var superior = document.getElementById("superior").value;
            var password = document.getElementById("password").value;
            var salary = document.getElementById("salary").value;

            if (firstName == "" || lastName == "" || email == "" || phone == "" || superior == "" || password == "" || salary == "") {
                alert("Please fill in all required fields.");
                return false;
            }

            if (!/^[a-zA-Z ]+$/.test(firstName)) {
                alert("First name can only contain letters and spaces.");
                return false;
            }

            if (!/^[a-zA-Z ]+$/.test(lastName)) {
                alert("Last name can only contain letters and spaces.");
                return false;
            }

            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            if (!/^[0-9]{10}$/.test(phone)) {
                alert("Please enter a 10-digit phone number.");
                return false;
            }

            if (isNaN(salary) || salary <= 0) {
                alert("Please enter a valid positive salary.");
                return false;
            }

            if (password.length < 8) {
                alert("Password must be at least 8 characters.");
                return false;
            }

            return true;
        }
    </script>
</body>
</html>
