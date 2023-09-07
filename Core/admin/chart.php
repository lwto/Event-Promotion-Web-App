<?php

require_once('../connection.php');

$coming_events = mysqli_query($mysqli, "SELECT *
FROM events
INNER JOIN artists ON events.artist_id=artists.id
WHERE events.date between CURDATE() and DATE_ADD(CURDATE(), INTERVAL 6 MONTH)
ORDER BY events.date ASC");


$past_events = mysqli_query($mysqli, "SELECT *
FROM events
INNER JOIN artists ON events.artist_id=artists.id
WHERE events.date < CURDATE()
ORDER BY events.date DESC ");

$a = mysqli_num_rows($coming_events);
$b = mysqli_num_rows($past_events);

$result = [$a , $b];

foreach ($result as $data){
    echo $data;
}

?>