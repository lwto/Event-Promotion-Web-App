<?php
// Create database connection 
include_once("connection.php");

// Fetch all  data from database
$past_events = mysqli_query($mysqli, "SELECT *
FROM events
INNER JOIN artists ON events.artist_id=artists.id
WHERE events.date < CURDATE() 
ORDER BY events.date DESC");


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
        <title>eventy | Past Events</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg py-3" >
                <div class="container">
                    <a class="navbar-brand font-weight-bold d-inline d-lg-none" href="index.php">eventy.</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand font-weight-bold d-none d-lg-inline" href="index.php">eventy.</a>
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="upcoming.php">Upcoming Events</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link active" href="past.php">Past Events</a>
                            </li>
                        </ul>
                        <button class="btn btn-dark"><a href="login.php">Admin Login</a></button>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="page-header">
                <h1 class="text-center text-white">Past Events</h1>
            </div>
            <div class="events my-5">
                <div class="container">
                    <div class="row" style="row-gap:40px;">
                    <?php
                        while($event_data = mysqli_fetch_array($past_events)) {
                    ?>
                        <div class="col-lg-6">
                            <div class="row" style="row-gap:15px;">
                                <div class="col-md-6">
                                    <img src="./Images/<?php echo $event_data['image']; ?>" class="up-img">
                                </div>
                                <div class="col-md-6">
                                    <h3><?php echo $event_data['title']; ?> by <?php echo $event_data['artist_name']; ?></h3>
                                    <div class="d-flex align-items-center" style="column-gap:8px;">
                                        <img src="./Images/<?php echo $event_data['artist_image']; ?>" width="50" height="50" class="rounded-circle object-fit-cover" style="max-width:50px;">
                                        <div class="social d-flex align-items-center" style="column-gap:15px;">
                                            <?php 
                                                if($event_data['facebook'] != NULL){
                                            ?>
                                        
                                                <a href="<?php echo $event_data['facebook']; ?>" >
                                                    <i class="ri-facebook-fill" style="font-size:20px;"></i>
                                                </a>
                                                <?php
                                                }
                                            ?>
                                            <?php 
                                                if($event_data['instagram'] != NULL){
                                            ?>
                                            
                                                <a href="<?php echo $event_data['instagram']; ?>" >
                                                    <i class="ri-instagram-fill" style="font-size:20px;"></i>
                                                </a>
                                                <?php
                                                }
                                            ?>
                                            <?php 
                                                if($event_data['twitter'] != NULL){
                                            ?>
                                            
                                                <a href="<?php echo $event_data['twitter']; ?>" >
                                                    <i class="ri-twitter-fill" style="font-size:20px;"></i>
                                                </a>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <p class="mt-2 mb-0">Category: <?php echo $event_data['category']; ?></p>
                                    <p class=" mb-0">Fees: <?php echo $event_data['fees']; ?></p>
                                    <p class="mb-0">Date - <?php echo date('d-m-Y', strtotime($event_data['date'])); ?> </p>
                                    <p>Time - <?php echo date('g.i A', strtotime($event_data['starttime'])) ?> to <?php echo date('g.i A', strtotime($event_data['endtime'])) ?></p>
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
        </main>
        <footer class="py-3 bg-dark text-white">
            <p class="text-center mb-0">©2023 copyright eventy.</p>
        </footer>
    <!-- JQuery -->
    <script src="JS/jquery.js"></script> 
    <!-- Bootstrap -->  
    <script src="JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>