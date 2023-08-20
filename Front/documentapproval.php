<!DOCTYPE html>
<html>
<head>
	<title>Work Approval</title>
	<link rel="stylesheet" href="../Style/documentapproval.css">
</head>


<body>
	<?php 
	include 'include.php';
	include '../Back/conn.php';  
	?>
	<div class="main" style="margin-left:100px">

	<h1>Work Approval</h1>
	<div class="documentList">

		<?php
	$sql="SELECT * from documents where file_status='Pending';";
	$result = mysqli_query($conn, $sql);  
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
	while ($row = mysqli_fetch_assoc($result)) {
		print_r($row['employee_id']);
		?>
		<form class="approvalForm">
			<div class="document">
				<h3>ID: <?php echo $row['id']?></h3>
				<h3>FileName:<?php echo $row['file_name']?></h3>
				<p>Status:<?php echo $row['file_status']?></p>
				<p>Employee id: <?php echo $row['employee_id']?></p>
				<p>Employer:<?php echo $row['employer_id']?></p>
				<button type="button" onclick="openPopup(<?php echo $row['id'] ?>,<?php echo $row['employee_id'] ?>)">Approve</button>
				<button type="button" onclick="openrejectPopup(<?php echo $row['id'] ?>)"class="reject">Reject</button>
				<a class='downloadFile' href=<?php echo "documentview.php?id=".$row['id']?>>View Documents</a>
				<!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
				<!-- <label for="rating">Rating</label>
				<input title="rating" class='rating'type=number min="0" max="5"/>
				<input type="submit"class='rating-submit' value="Submit"> -->
			</div>
		</form>
		<?php } ?>
	</div>
		//popoup div
	<div class="popup" id="popup">
		<div class="popup-inner">
			<span class="close-btn" onclick="closePopup()">x</span>
			<form class="approvePopup" id="approvePopup" action="../Back/rating.php" method="post">
				<h2>Document Rating</h2>
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
			<form class="approvePopup" id="declinePopup" method="post">
				<label for="weight">Reason for Rejection (out of 5):</label>
				<textarea id="reason" name="reason" rows="10" ></textarea>
		
				<br><br>
				<input type="submit" class="approveSubmit"value="Submit">
			</form>
		</div>
	</div>
	</div>

</body>
<script>
		function openPopup(documentId,user_id) {
			document.getElementById("approvePopup").action = "../Back/rating.php?id=" + documentId+"&uid="+user_id;
    		document.getElementById("popup").style.display = "block";
			// document.getElementById("popup").style.display = "block";
		}
		function openrejectPopup(documentId) {
			document.getElementById("declinePopup").action = "../Back/declineDocument.php?id=" + documentId;
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


