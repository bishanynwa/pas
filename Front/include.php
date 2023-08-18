<!DOCTYPE html>
<html>

<head>
	<title>My Sidebar Menu</title>
	<link rel="stylesheet" type="text/css" href="..\Style\include.css">

</head>

<body>
	<header>
		<div class="logo">
			<a href="dashboard.php">
				<img src="..\Images\logo.png" alt="My Logo">
			</a>
		</div>
		<a href="../Back/logout.php">
			<button class="logout-btn" onclick="showDropdown()">
				<img src="..\Images\logout-icon.png" alt="Logout" class="logout-icon">
			</button>
		</a>
	</header>

	<div class="sidebar">
		<ul>
			<?php
			session_start();
			// check is login
			if(!isset($_SESSION['user'])) {
				header("Location: login.php");
				exit;
			}
			include "../Back/conn.php";
			// $sql = "SELECT * FROM users";
			// $res = mysqli_query($conn, $sql);
			// if (mysqli_num_rows($res) > 0) {
				$role=$_SESSION['role'];
				// while ($row = mysqli_fetch_assoc($res)) {
					if ($role === $roles["EMPLOYEES"]) {
						echo "
							<li><a href='documentupload.php'>Work Upload</a></li>
							
							<li><a href='#'>Employee Ratings</a></li>
					
							
							";
					} 
					elseif ($role === $roles["EMPLOYER"]) {
						echo "
								<li><a href='documentapproval.php'>Work Approval</a></li>
								<li><a href='#'>Employee Ratings</a></li>
								<li><a href='employeesetup.php'>Employee Setup</a></li>
								<li><a href='employersetup.php'>Employer Setup</a></li>
							";
					} 
					elseif ($role === 3) {
						echo "
							<li><a href='documentupload.php'>Work Upload</a></li>
							<li><a href='#'>Employee Ratings</a></li>
							";
					}


				// }
			// }
			?>
			<!-- <li><a href="documentupload.php">Work Upload</a></li>
			<li><a href="documentapproval.php">Work Approval</a></li>
			<li><a href="#">Employee Ratings</a></li>
			<li><a href="employeesetup.php">Employee Setup</a></li>
			<li><a href="employersetup.php">Employer Setup</a></li> -->
		</ul>
	</div>

</body>

</html>