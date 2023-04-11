<!DOCTYPE html>
<html>
<head>
	<title>My Sidebar Menu</title>
	<link rel="stylesheet" type="text/css" href="..\Style\include.css">

</head>
<body>
	<header>
		<div class="logo">
			<img src="..\Images\logo.png" alt="My Logo">
		</div>
		<button class="logout-btn" onclick="showDropdown()">
			<img src="..\Images\logout-icon.png" alt="Logout" class="logout-icon">
		</button>
	</header>

	<div class="sidebar">
		<ul>
			<li><a href="documentupload.php">Work Upload</a></li>
			<li><a href="documentapproval.php">Work Approval</a></li>
			<li><a href="#">Employee Ratings</a></li>
			<li><a href="employeesetup.php">Employee Setup</a></li>
			<li><a href="employersetup.php">Employer Setup</a></li>
		</ul>
	</div>

</body>
</html>
