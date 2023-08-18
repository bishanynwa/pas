<?php
	include 'conn.php';  


    $docsWeight = $_POST['weight'];
    $rating = $_POST['rating'];
    $document_id = $_GET['id'];
    $u_id = $_GET['uid'];
    // Update the weight and rating in the documents table
    $sql = "UPDATE documents SET weight = ?, ratings = ?, file_status = 'Approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $docsWeight, $rating, $document_id);
    $stmt->execute();
    $stmt->close();

    // Select documents for a specific employee
    $selectSql = "SELECT * FROM documents doc left JOIN employees as emp on doc.employee_id=emp.id WHERE employee_id = ?;";
    $selectStmt = $conn->prepare($selectSql);
    $selectStmt->bind_param("i", $u_id);
    $selectStmt->execute();
    $result = $selectStmt->get_result();

// Loop through the results
while ($row = $result->fetch_assoc()) {
    $employee_name = $row['first_name'];
}
    $selectStmt->close();
    // ?after this
    // Check if the 'emp_id' column exists in the performancescores table
    $checkColumnQuery = "SELECT COUNT(*) as column_exists
    FROM information_schema.COLUMNS 
    WHERE TABLE_NAME = 'performancescores' AND COLUMN_NAME = 'emp_id'";
  $columnCheckResult = $conn->query($checkColumnQuery);
  $columnCheckData = $columnCheckResult->fetch_assoc();
  $columnCheckResult->free_result(); // Free the result set before executing the next query
  

    if ($columnCheckData['column_exists'] == 0) {
    // If 'emp_id' column doesn't exist, add the column to the performancescores table
    $addColumnQuery = "ALTER TABLE performancescores
    ADD COLUMN emp_id INT NOT NULL,
    ADD CONSTRAINT fk_emp_id FOREIGN KEY (emp_id) REFERENCES employees(id)
    ON DELETE CASCADE ON UPDATE CASCADE";
    $addColumnResult = $conn->query($addColumnQuery);
    }

    // Fetch the documents for a specific employee
    $selectSql = "SELECT * FROM documents WHERE employee_id = ?";
    $selectStmt = $conn->prepare($selectSql);
    $selectStmt->bind_param("i", $u_id);
    $selectStmt->execute();
    $result = $selectStmt->get_result();

    $totalrating = 0;
    $totalweight = 0;
    $number = 0;

    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        // print_r([ $row['ratings'],$row['weight']]);
    // Process and display the document information
    $totalrating += $row['ratings'];
    $totalweight += $row['weight'];
    $number++;
    }
// print_r([$totalrating , $totalweight ,$number]);
    $avgRating = ($totalrating + $totalweight) / $number;

    // Close the SELECT statement
    $selectStmt->close();

    // Update or insert into performancescores
    $updateSql = "UPDATE performancescores SET employee_name = ?, performance_score = ? WHERE emp_id = ?";
    $insertSql = "INSERT INTO performancescores (employee_name, performance_score, emp_id) VALUES (?, ?, ?)";
    print_r([$employee_name, $avgRating, $u_id]);
    // Check if the employee's performance already exists in performancescores
    $checkPerformanceQuery = "SELECT COUNT(*) as performance_exists
        FROM performancescores WHERE emp_id = ?";
    $checkPerformanceStmt = $conn->prepare($checkPerformanceQuery);
    $checkPerformanceStmt->bind_param("i", $u_id);
    $checkPerformanceStmt->execute();
    $performanceCheckData = $checkPerformanceStmt->get_result()->fetch_assoc();
    // $performanceCheckStmt->close();
    // $performanceCheckResult->close();
    if ($performanceCheckData['performance_exists'] > 0) {
    // Update the existing performance record
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sdi", $employee_name, $avgRating, $u_id);
    } else {
    // Insert a new performance record
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sdi", $employee_name, $avgRating, $u_id);
    }

    // Execute the statement
    $stmt->execute();
    $stmt->close();
    // die();
    // Redirect to documentapproval.php
    header('Location: ../Front/documentapproval.php');
    exit();
?>
