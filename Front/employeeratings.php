<html>
<link rel="stylesheet" type="text/css" href="../Style/employeeratings.css">
</html>
<?php

include "../Back/conn.php";
include "include.php";

// Check if the PerformanceScores table already exists
$tableExistsQuery = "SHOW TABLES LIKE 'PerformanceScores'";
$tableExistsResult = $conn->query($tableExistsQuery);

$sqlCalculate = "SELECT
            employee_name,
            performance_score,
            RANK() OVER (ORDER BY performance_score DESC) AS rank
        FROM
            PerformanceScores";
$resultAlgo = $conn->query($sqlCalculate);
$totalrating=0;
if ($resultAlgo->num_rows > 0) {
    $totalusers=$resultAlgo->num_rows;
    while ($row = $resultAlgo->fetch_assoc()) {
       $totalrating+=$row['performance_score'];

    }
}
$avg_rating=$totalrating/$totalusers;
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
                <th> Promotion</th>
                </tr>";
                while ($row = $result->fetch_assoc()) {
                    if($row["performance_score"]>$avg_rating){
                        $color='red';
                        $status='demotion';
                    }else{
                        $color='green';
                        $status='promotion';
                    }
        echo "<tr style='background-color:".$color.";color:white; font-weight:bold'>
                <td>".$row["employee_name"]."</td>
                <td>".$row["performance_score"]."</td>
                <td>".$row["rank"]."</td>
                <td>".$status."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}
?>
