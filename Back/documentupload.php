<?php
include 'conn.php';

// Get employee_id and employer_id from session (assuming you already have this implemented)
$employee_id = $_SESSION['employee_id'];
$employer_id = $_SESSION['employer_id'];

// Get file name and document description from form submission
$docName = $_POST['docName'];
$docDesc = $_POST['docDesc'];

// Check if file was uploaded successfully
if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
    // Get file information
    $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
    $fileName = $_FILES['fileUpload']['name'];
    $fileSize = $_FILES['fileUpload']['size'];
    $fileType = $_FILES['fileUpload']['type'];

    // Open the file for reading
    $fileHandle = fopen($fileTmpPath, 'r');
    $fileContent = fread($fileHandle, $fileSize);
    fclose($fileHandle);

    // Insert document data into database
    $sql = "INSERT INTO documents (file_name, file, file_status, employee_id, employer_id, reason, ratings) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $file_status = "Pending"; // default file status is "Pending"
    $reason = ""; // default reason is empty
    $ratings = ""; // default ratings is empty
    $stmt->bind_param("sssiiss", $docName, $fileContent, $file_status, $employee_id, $employer_id, $reason, $ratings);
    $stmt->execute();
    $stmt->close();

    // Redirect to success page
    header('Location: ../Front/dashboard.php');
    exit();
} else {
    // Redirect to error page
    header('Location: error.php');
    exit();
}
?>
