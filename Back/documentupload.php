<?php
include 'conn.php';
session_start();
// Get employee_id and employer_id from session (assuming you already have this implemented)
$employee_id = $_SESSION['employees'];
print_r($_SESSION);

$sql="SELECT emplyer.id employerid FROM employees emp inner join employer emplyer on emp.id=emplyer.id where emp.id=$employee_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  

$employer_id = $row['employerid'];
// print_r($row);s
// die();
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
    $path = $_FILES['fileUpload']['name'];
    // name the file with extensionnnnn
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $fileFull=$docName.'.'.$ext;
    // echo $fileFull;
    // // die();
    // // Read the file content as binary data
    // $fileContent = file_get_contents($fileTmpPath);
    $fileHandle = fopen($fileTmpPath, 'r');
    $fileContent = fread($fileHandle, $fileSize);
    fclose($fileHandle);
    
    // Insert document data into database
    $sql = "INSERT INTO documents (file_name, file, file_status, employee_id, employer_id, reason, ratings)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $file_status = "Pending"; // default file status is "Pending"
    $reason = ""; // default reason is empty
    $ratings = ""; // default ratings is empty
    $stmt->bind_param("sssiiss", $fileFull, $fileContent, $file_status, $employee_id, $employer_id, $reason, $ratings);
    $stmt->execute();
    $stmt->close();
    echo $docName;
    // Redirect to success page
    header('Location: ../Front/dashboard.php');
    exit();
} else {
    // Redirect to error page
    header('Location: error.php');
    exit();
}
?>

