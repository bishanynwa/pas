

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Work Upload Page</title>
    <link rel="stylesheet" href="../Style/documentupload.css">
  </head>
  <body>
    <?php include 'include.php'; ?>

    <main>
      <h1>Work Upload Page</h1>
	  <br><br>
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Upload Document:</label>
        <input type="file" id="fileUpload" name="fileUpload">
        <br><br>
        <label for="docName">Document Name:</label>
        <input type="text" id="docName" name="docName">
        <br><br>
        <label for="docDesc">Document Description:</label>
        <textarea id="docDesc" name="docDesc" rows="4" cols="50"></textarea>
        <br><br>
        <input type="submit" value="Submit">
      </form>
    </main>

  </body>
</html>
