<?php
// Create database connection 
include_once("../connection.php");

// Fetch all artist data from database
$artists = mysqli_query($mysqli, "SELECT * FROM artists ORDER BY id ASC");
$events = mysqli_query($mysqli, "SELECT * FROM events ORDER BY id ASC");
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


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="../CSS/responsive.css">

        <!-- icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>Admin Dashboard</title>
    </head>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">eventy.</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link align-middle px-0 text-white border-right">
                                <i class="fas fa-tachometer-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-calendar-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Events</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="Event/viewevents.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Events</a>
                                </li>
                                <li>
                                    <a href="Event/addevent.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-calendar-plus"></i> <span class="d-none d-sm-inline">Add Event</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user-alt"></i><span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Artists</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="Artist/viewartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Artists</a>
                                </li>
                                <li>
                                    <a href="Artist/addartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-user-plus"></i> <span class="d-none d-sm-inline">Add Artist</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        
                    </ul>
                </div>
            </div>
            <div class="col content-area py-3">
                
                <div class="row justify-content-center">
                   
                    <div class="col-lg-10 ">
                        <div class="text-end w-100 mb-5">
                            <h3>Welcome Admin!</h3>
                        </div>
                        <div class="row justify-content-between" style="row-gap: 20px;">
                            
                            <div class="col-lg-6">
                                <div class="card border border-black">
                                    <div class="card-body">
                                    <div class="chart">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="card border border-black">
                                    <div class="card-body">
                                    <div class="">
                                        <canvas id="myGraph"></canvas>
                                    </div>
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <h3 class="mt-5">Upcoming Events</h3>
                        <div class="mt-4 table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Artist Name</th>
                                    <th scope="col">Attendance</th>
                                    <th scope="col">Fees</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=1;
                                    while($event_data = mysqli_fetch_array($coming_events)) {

                                        $date = date('d-m-Y', strtotime($event_data['date']));  
                                        $starttime = date('g.i A', strtotime($event_data['starttime']));  
                                        $endtime = date('g.i A', strtotime($event_data['endtime']));  
                                       
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$event_data['title']."</td>";
                                        echo "<td>".$event_data['category']."</td>";
                                        echo "<td>".$event_data['artist_name']."</td>";
                                        echo "<td>".$event_data['attendance']."</td>";
                                        echo "<td>".$event_data['fees']."</td>";
                                        echo "<td>".$date."</td>";
                                        echo "<td>".$starttime."</td>";
                                        echo "<td>".$endtime."</td>";
                                        ?>
                                        <?php
                                        echo "</tr>";
                                        $i++;
                                    }
                                    
                                ?>
                                  
                                </tbody>
                              </table>
                        </div>

                        <h3 class="mt-5">Past Events</h3>
                        <div class="mt-4 table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Artist Name</th>
                                    <th scope="col">Attendance</th>
                                    <th scope="col">Fees</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=1;
                                    while($event_data = mysqli_fetch_array($past_events)) {

                                        $date = date('d-m-Y', strtotime($event_data['date']));  
                                        $starttime = date('g.i A', strtotime($event_data['starttime']));  
                                        $endtime = date('g.i A', strtotime($event_data['endtime']));  
                                       
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$event_data['title']."</td>";
                                        echo "<td>".$event_data['category']."</td>";
                                        echo "<td>".$event_data['artist_name']."</td>";
                                        echo "<td>".$event_data['attendance']."</td>";
                                        echo "<td>".$event_data['fees']."</td>";
                                        echo "<td>".$date."</td>";
                                        echo "<td>".$starttime."</td>";
                                        echo "<td>".$endtime."</td>";
                                        ?>
                                        <?php
                                        echo "</tr>";
                                        $i++;
                                    }
                                    mysqli_close($mysqli);
                                ?>
                                  
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JS -->
    <script src="../JS/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>    
    <script src="../JS/script.js"></script>
    <script src="../JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>