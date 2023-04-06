<!DOCTYPE html>
<html>
<head>
	<title>Signup Page</title>
	<link rel="stylesheet" href="..\Style\signup.css">
</head>
<body>
	<div class="container">
		<h1>Signup</h1>
		<form onsubmit="return validateForm()">
			<label for="name">Name</label>
			<input type="text" id="name" name="name" placeholder="Enter your full name" required>
			
			<label for="email">Email address</label>
			<input type="email" id="email" name="email" placeholder="Enter your email address" required>
			
			<label for="user-type">User type</label>
			<select id="user-type" name="user-type">
				<option value="">Select a user type</option>
				<option value="employee">Employee</option>
				<option value="employer">Employer</option>
			</select>
			
			<label for="phone">Phone number</label>
			<input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter a password" required>
			
			<label for="retype-password">Retype password</label>
			<input type="password" id="retype-password" name="retype-password" placeholder="Retype your password" required>
			
			<input type="submit" value="Submit">
		</form>
	</div>
	
	<script>
		function validateForm() {
			// Get form input values
			const name = document.getElementById("name").value;
			const email = document.getElementById("email").value;
			const userType = document.getElementById("user-type").value;
			const phone = document.getElementById("phone").value;
			const password = document.getElementById("password").value;
			const retypePassword = document.getElementById("retype-password").value;
			
			// Regular expression for validating phone number format
			const phoneRegex = (\+977)?[9][6-9]\d{8};
			
			// Validate name (only letters and spaces allowed)
			if (!/^[a-zA-Z\s]+$/.test(name)) {
				alert("Please enter a valid name.");
				return false;
			}
			
			// Validate email (simple format check)
			if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
				alert("Please enter a valid email address.");
				return false;
			}
			
			// Validate user type (must be selected)
			if (userType === "") {
				alert("Please select a user type.");
				return false;
			}
			
			// Validate phone number (must be in the format +977XXXXXXXXX or +977XXXXXXXXXX)
			if (!phoneRegex.test(phone)) {
				alert("Please enter a valid phone number (in the format +977XXXXXXXXX or +977XXXXXXXXXX).");
				return false;
			}
			
			// Validate password (must be at least 8 characters long)
			if (password.length < 8) {
				alert("Password must be at least 8 characters long.");
				return false;
			}
			
			// Validate retype password (must match password)
			if (retypePassword !== password) {
				alert("Passwords do not match.");
				return false;
			}
			
			// Form validation passed
			return true;
		}
	</script>
</body>
</
