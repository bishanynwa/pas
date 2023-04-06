<!DOCTYPE html>
<html>
<head>
	<title>Document Upload Page</title>
	<link rel="stylesheet" href="..\Style\documentupload.css">
</head>
<body>
	<div class="container">
    <h1>Work Document Upload</h1>
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="file">Choose a document to upload:</label>
				<input type="file" id="file" name="file">
			</div>
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea id="description" name="description"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Submit">
			</div>
		</form>
	</div>
</body>
</html>