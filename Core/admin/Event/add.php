<?php
include_once("../../connection.php");

    $title = $_POST['title'];
    $category = $_POST['category'];
    $artist_id = $_POST['artist'];
    $attendance = $_POST['attendance'];
    $date = date('Y-m-d', strtotime($_POST['date']));
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];
    $fees = $_POST['fees'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../../Images/" . $filename;

    // Insert event data into table
    $result = mysqli_query($mysqli, "INSERT INTO events(image,title,category,artist_id,attendance,fees,date,starttime,endtime) VALUES('$filename','$title','$category','$artist_id','$attendance','$fees','$date','$starttime','$endtime')");

    if (move_uploaded_file($tempname, $folder)) {
        header('Location: viewevents.php');
    }
    else {
        echo "<h3> Failed to upload image!</h3>";
    }

    mysqli_close($mysqli);

?>