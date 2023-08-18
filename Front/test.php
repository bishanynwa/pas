<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Document Management</title>
    <link rel="stylesheet" href="../Style/documentupload.css">
  </head>
  <body>
    <?php include 'include.php'; ?>

    <main>
      <h1>Document Management</h1>
      <br><br>
      <form action="../Back/documentupload.php" method="post" enctype="multipart/form-data">
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

      <h2>Uploaded Documents</h2>
      <table>
        <thead>
          <tr>
            <th>Document Name</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Example row, replace with dynamic data -->
          <tr>
            <td>Document 1</td>
            <td>Description 1</td>
            <td>Pending</td>
            <td>
              <button class="approve-btn">Approve</button>
              <button class="reject-btn">Reject</button>
            </td>
          </tr>
          <!-- Add more rows dynamically -->
        </tbody>
      </table>
    </main>
    <script src="../Script/documentmanagement.js"></script>
  </body>
</html>