<?php
include_once("../../connection.php");


    $name = $_POST['name'];
    $biography = $_POST['biography'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder = "../../Images/" . $filename;

    // Insert artist data into table
    $result = mysqli_query($mysqli, "INSERT INTO artists(artist_image,artist_name,biography,facebook,instagram,twitter) VALUES('$filename','$name','$biography','$facebook','$instagram','$twitter')");

    if (move_uploaded_file($tempname, $folder)) {
        header('Location: viewartist.php');
    }
    else {
        echo "<h3> Failed to upload image!</h3>";
    }
    
    mysqli_close($mysqli);

?>