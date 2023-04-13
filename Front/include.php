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
		<button class="logout-btn" onclick="showDropdown()">
			<img src="..\Images\logout-icon.png" alt="Logout" class="logout-icon">
		</button>
	</header>

	<div class="sidebar">
		<ul>
			<?php
			include "../Back/conn.php";
			$sql = "SELECT * FROM users";
			$res = mysqli_query($conn, $sql);
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					if ($row['userStatus'] === 1) {
						echo "
							<li><a href='documentupload.php'>Work Upload</a></li>
							<li><a href='documentapproval.php'>Work Approval</a></li>
							<li><a href='#'>Employee Ratings</a></li>
							<li><a href='employeesetup.php'>Employee Setup</a></li>
							<li><a href='employersetup.php'>Employer Setup</a></li>
							
							";
					} 
					elseif ($row['userStatus'] === 2) {
						echo "
								<li><a href='documentapproval.php'>Work Approval</a></li>
								<li><a href='#'>Employee Ratings</a></li>
								<li><a href='employeesetup.php'>Employee Setup</a></li>
							";
					} 
					elseif ($row['userStatus'] === 3) {
						echo "
							<li><a href='documentupload.php'>Work Upload</a></li>
							<li><a href='#'>Employee Ratings</a></li>
							";
					}


				}
			}
			?>
			<li><a href="documentupload.php">Work Upload</a></li>
			<li><a href="documentapproval.php">Work Approval</a></li>
			<li><a href="#">Employee Ratings</a></li>
			<li><a href="employeesetup.php">Employee Setup</a></li>
			<li><a href="employersetup.php">Employer Setup</a></li>
		</ul>
	</div>

</body>

</html>