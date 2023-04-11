<!DOCTYPE html>
<html>
<head>
	<title>Work Approval</title>
	<link rel="stylesheet" href="../Style/documentapproval.css">
</head>
<body>
	<?php 
	include 'include.php';?>
	<h1>Work Approval</h1>

	<form class="approvalForm">
		<label for="doc-name">Document Name:</label>
		<input type="text" id="doc-name" name="doc-name" placeholder="Enter document name...">
		<label for="doc-file">Document File:</label>
		<input type="file" id="doc-file" name="doc-file">
		<button type="button" onclick="openPopup()">Approve</button>
		<button type="button" onclick="openrejectPopup()"class="reject">Reject</button>
	</form>
	//popoup div
	<div class="popup" id="popup">
		<div class="popup-inner">
			<span class="close-btn" onclick="closePopup()">x</span>
			<h2>Document Rating</h2>
			<form class="approvePopup">
				<label for="weight">Document Weight (out of 5):</label>
				<input type="number" id="weight" name="weight" min="0" max="5">
				<br><br>
				<label for="rating">Document Rating (out of 5):</label>
				<input type="number" id="rating" name="rating" min="0" max="5">
				<br><br>
				<input type="submit" class="approveSubmit"value="Submit">
			</form>
		</div>
	</div>
	<div class="popup" id="popupreject">
		<div class="popup-inner">
			<span class="close-btn" onclick="closerejectPopup()">x</span>
			<h2>Reason for Rejection</h2>
			<form class="approvePopup">
				<label for="weight">Reason for Rejection (out of 5):</label>
				<textarea id="reason" name="reason" rows="10" ></textarea>
		
				<br><br>
				<input type="submit" class="approveSubmit"value="Submit">
			</form>
		</div>
	</div>
</body>
<script>
		function openPopup() {
			document.getElementById("popup").style.display = "block";
		}
		function openrejectPopup() {
			document.getElementById("popupreject").style.display = "block";
		}
		

		function closePopup() {
			document.getElementById("popup").style.display = "none";
		}
		function closerejectPopup() {
			document.getElementById("popupreject").style.display = "none";
		}
	</script>
</html> 


