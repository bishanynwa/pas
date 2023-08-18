<?php
	include 'conn.php';  

    print_r($_POST);
    
    $reason = $_POST['reason'];
    $document_id = $_GET['id'];

    // Update the weight and rating in the documents table
    $sql = "UPDATE documents SET reason=?, file_status='Declined' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $reason, $document_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to documentapproval.php
    header('Location: ../Front/documentapproval.php');
    exit();
?>
