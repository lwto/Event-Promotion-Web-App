<?php
 header('Content-Type: application/json');

include('../connection.php');

$months = array("january", "february", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");
$monthvalues = array();
foreach ($months as $month) {
    $monthvalues[$month] = 0;
}

$result = mysqli_query($mysqli, "SELECT LOWER(MONTHNAME(date)), count(*) FROM events GROUP BY LOWER(MONTHNAME(date))");
while ($row = mysqli_fetch_array($result)) {
    $monthvalues[$row[0]] = (int)$row[1];
}

print (json_encode($monthvalues));

?>