<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>
    <link rel="stylesheet" href="..\Style\login.css">

</head>
<body>
	<div class="container">
		<h1>Admin Login</h1>
		<form>
			<label for="email">Email address</label>
			<input type="email" id="email" name="email" placeholder="Enter your email address" required>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password" placeholder="Enter your password" required>
			
			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>

<script>
  const form = document.querySelector('form');
  const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');

  form.addEventListener('submit', (event) => {
    event.preventDefault();

    const email = emailInput.value.trim();
    const password = passwordInput.value.trim();

    if (!isValidEmail(email)) {
      alert('Please enter a valid email address');
      emailInput.focus();
      return;
    }

    if (password.length < 6) {
      alert('Password must be at least 6 characters long');
      passwordInput.focus();
      return;
    }

    // If all inputs are valid, submit the form
    form.submit();
  });

  function isValidEmail(email) {
    // Regular expression to match email format
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }
</script>
