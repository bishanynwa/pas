<?php
include '../Back/conn.php';

// Get the document ID from the request or session, assuming you have it available
$document_id = $_GET['id'];

// Fetch the file data from the database
$sql = "SELECT file_name, file FROM documents WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $document_id);
$stmt->execute();
$stmt->bind_result($file_name, $file_content);
$stmt->fetch();
$stmt->close();

// Set the appropriate header for displaying the DOCX file in the browser
header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
header("Content-Disposition: inline; filename=\"$file_name\"");

// Output the file content
echo $file_content;
exit();
?>
