<?php
// Create database connection 
include_once("connection.php");

// Fetch all  data from database
$featured = mysqli_query($mysqli, "SELECT *
FROM events
INNER JOIN artists ON events.artist_id=artists.id
WHERE events.id = 2");

$featured_data = mysqli_fetch_array($featured, MYSQLI_ASSOC);  

$featured_date = date('d-m-Y', strtotime($featured_data['date']));  
$featured_starttime = date('g.i A', strtotime($featured_data['starttime']));  
$featured_endtime = date('g.i A', strtotime($featured_data['endtime']));  

$upcoming_events = mysqli_query($mysqli, "SELECT *
FROM events
INNER JOIN artists ON events.artist_id=artists.id
WHERE events.date between CURDATE() and DATE_ADD(CURDATE(), INTERVAL 6 MONTH)
ORDER BY events.date DESC
LIMIT 3 ");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="CSS/bootstrap/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/responsive.css">
    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>eventy  | Home</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg py-3" >
            <div class="container">
                <a class="navbar-brand font-weight-bold d-inline d-lg-none" href="#">eventy.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand font-weight-bold d-none d-lg-inline" href="#">eventy.</a>
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="upcoming.php">Upcoming Events</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="past.php">Past Events</a>
                        </li>
                    </ul>
                    <button class="btn btn-dark"><a href="login.php">Admin Login</a></button>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="banner container section">
            <div class="row px-3 align-items-center" style="row-gap:15px;">
                <div class="col-lg-5">
                    <h1 class="heading_title">
                        <?php echo $featured_data['title']; ?>
                    </h1>
                    <div class="mt-3">
                        <h5>Category: <?php echo $featured_data['category']; ?></h5>
                        <h5>Attendance: <?php echo $featured_data['attendance']; ?></h5>
                        <h5>Fees: <?php echo $featured_data['fees']; ?></h5>
                        <h5>Date: <?php echo $featured_date; ?></h5>
                        <h5>Time: <?php echo $featured_starttime; ?> - <?php echo $featured_endtime; ?></h5>

                    </div>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-5">
                    <div class="card bg-dark text-white">
                        <div class="card-body d-flex justify-content-between w-100 flex-wrap" style="row-gap:15px;">
                            <div class="d-flex justify-content-between flex-column">
                                <div>
                                    <h3> <?php echo $featured_data['artist_name']; ?></h3>
                                    <p> <?php echo $featured_data['biography']; ?></p>
                                </div>
                                <div class="social d-flex align-items-center" style="column-gap:15px;">
                                    <?php 
                                        if($featured_data['facebook'] != NULL){
                                    ?>
                                    
                                        <a href="<?php echo $featured_data['facebook']; ?>" class="text-white">
                                            <i class="ri-facebook-fill" style="font-size:20px;"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <?php 
                                        if($featured_data['instagram'] != NULL){
                                    ?>
                                    
                                        <a href="<?php echo $featured_data['instagram']; ?>" class="text-white">
                                            <i class="ri-instagram-fill" style="font-size:20px;"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                    <?php 
                                        if($featured_data['twitter'] != NULL){
                                    ?>
                                    
                                        <a href="<?php echo $featured_data['twitter']; ?>" class="text-white">
                                            <i class="ri-twitter-fill" style="font-size:20px;"></i>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="artist-img">
                                    <img src="./Images/<?php echo $featured_data['artist_image']; ?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="featured-img mt-4 px-3">
                <img src="./Images/<?php echo $featured_data['image']; ?>" >
            </div>

        </div>
        <div class="section upcoming-events bg-dark text-white">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Upcoming Events</h1>
                    <div><button class="btn btn-info"><a href="upcoming.php">View More</a></button></div>
                </div>
                <div class="row pt-4">
                    <?php
                        while($event_data = mysqli_fetch_array($upcoming_events)) {
                    ?>
                        <div class="col-lg-4">
                            <div class="upcomming-img mt-4">
                                <img src="./Images/<?php echo $event_data['image']; ?>" class="up-img">
                                <div class="mt-3 event-info">
                                    <h3><?php echo $event_data['title']; ?> by <?php echo $event_data['artist_name']; ?></h3>
                                    <h4><?php echo $event_data['category']; ?></h4>
                                    <p><?php echo date('d-m-Y', strtotime($event_data['date'])); ?> ( <?php echo date('g.i A', strtotime($event_data['starttime'])) ?> to <?php echo date('g.i A', strtotime($event_data['endtime'])) ?>)</p>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                        mysqli_close($mysqli);
                    ?>
                </div>
            </div>
        </div>
        <div class="section category">
            <div class="container">
                <h1 class="text-center">We Have Many<br> Category Event</h1>
                <div class="row justify-content-between px-lg-5 px-md-5 mt-5" style="row-gap: 30px;">
                    <div class="col-lg-5">  
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="ri-disc-fill"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Music Events</h5>
                                <p>Musical performances of singing and playing instruments in various music shows, concerts, etc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="ri-file-image-fill"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Arts Exhibition</h5>
                                <p>Generally, art exhibitions are filled with tangible artistic displays like paintings, drawings, etc.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="ri-emotion-laugh-fill"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Stand Up Comedy</h5>
                                <p>A comedic performance to a live audience in which the performer addresses the audience directly from the stage. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="ri-gamepad-fill"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Esport Tournaments</h5>
                                <p>Multiplayer video game competitions, particularly between professional players, individually or as teams.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="fa-solid fa-pizza-slice"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Food Festival</h5>
                                <p>An event that features a variety of foods, which are usually available for tasting or purchase. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex" style="gap: 15px;">
                            <div class="">
                                <div class="category-box">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                            </div>
                            <div class="ml-3">
                                <h5>Conferences</h5>
                                <p>A gathering of many people who talk about a specific subject or topic.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="call-to-action bg-dark py-5 text-white">
            <div class="container">
                <h1 class="text-center">Don't Miss Out On All The Funs!</h1>
                <p class="text-center mt-3">Join various events on our venue.</p>
                <div class="text-center mt-5">
                    <button class="btn btn-info"><a href="upcoming.php">View Upcoming Events</a></button>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-3">
        <p class="text-center mb-0">©2023 copyright eventy.</p>
    </footer>
    <!-- JS -->
    <!-- Bootstrap -->  
    <script src="JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>