<?php
#include include.php; 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Document Approval System</title>
	<link rel="stylesheet" type="text/css" href="..\Style\documentapproval.css">
</head>
<body>
	<div class="container">
		<h1>Document Approval System</h1>
		<form>
			<label for="document">Select a document:</label>
			<input type="file" id="document" name="document"><br><br>

			<label for="status">Document status:</label>
			<select id="status" name="status">
			  <option value="approved">Approved</option>
			  <option value="rejected">Rejected</option>
			</select><br><br>

			<div id="reason">
				<label for="reason">Reason for rejection:</label>
				<textarea id="reason" name="reason"></textarea><br><br>
			</div>

			<div id="rating">
				<label for="rating">Rate the document out of 5:</label>
				<input type="range" id="rating" name="rating" min="0" max="5"><br><br>
			</div>

			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
