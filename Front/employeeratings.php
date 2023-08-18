<html>
<link rel="stylesheet" type="text/css" href="../Style/employeeratings.css">
</html>
<?php

include "../Back/conn.php";
include "include.php";

// Check if the PerformanceScores table already exists
$tableExistsQuery = "SHOW TABLES LIKE 'PerformanceScores'";
$tableExistsResult = $conn->query($tableExistsQuery);


// Retrieve the Performance Scores and Ranks
$sql = "SELECT
            employee_name,
            performance_score,
            RANK() OVER (ORDER BY performance_score DESC) AS rank
        FROM
            PerformanceScores";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the results in a table
   
    echo "
    <table>
            <tr>
                <th>Employee Name</th>
                <th>Performance Score</th>
                <th>Rank</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["employee_name"]."</td>
                <td>".$row["performance_score"]."</td>
                <td>".$row["rank"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}
?>
