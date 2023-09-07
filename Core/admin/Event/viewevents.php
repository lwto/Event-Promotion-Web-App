<?php
// Create database connection 
include_once("../../connection.php");

// Fetch all devent data from database
$events = mysqli_query($mysqli, "SELECT * FROM events ORDER BY id ASC");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../../CSS/bootstrap/bootstrap.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../../CSS/style.css">
        <link rel="stylesheet" href="../../CSS/responsive.css">
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
                    <a href="../../index.php" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">eventy.</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="../dashboard.php" class="nav-link align-middle px-0 text-white border-right">
                                <i class="fas fa-tachometer-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-calendar-alt"></i> <span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Events</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="viewevents.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Events</a>
                                </li>
                                <li>
                                    <a href="addevent.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-calendar-plus"></i> <span class="d-none d-sm-inline">Add Event</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user-alt"></i><span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Artists</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="../Artist/viewartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i>  <span class="d-none d-sm-inline">View Artists</a>
                                </li>
                                <li>
                                    <a href="../Artist/addartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-user-plus"></i>  <span class="d-none d-sm-inline">Add Artist</a>
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
                
                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <h3 class="">Event List</h3>
                            <button class="btn btn-dark"><a href="addevent.php" class="text-white text-decoration-none">Add Event</a></button>
                        </div>
                        <div class="mt-5 table-responsive">
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
                                    <th scope="col">Action</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=1;
                                    while($user_data = mysqli_fetch_array($events)) {
                                        $artistid = $user_data['artist_id'];
                                        $artists = mysqli_query($mysqli, "select * from artists where id = '$artistid'");
                                        $artist_data = mysqli_fetch_array($artists, MYSQLI_ASSOC);  

                                        $date = date('d-m-Y', strtotime($user_data['date']));  
                                        $starttime = date('g.i A', strtotime($user_data['starttime']));  
                                        $endtime = date('g.i A', strtotime($user_data['endtime']));  
                                       
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        echo "<td>".$user_data['title']."</td>";
                                        echo "<td>".$user_data['category']."</td>";
                                        echo "<td>".$artist_data['artist_name']."</td>";
                                        echo "<td>".$user_data['attendance']."</td>";
                                        echo "<td>".$user_data['fees']."</td>";
                                        echo "<td>".$date."</td>";
                                        echo "<td>".$starttime."</td>";
                                        echo "<td>".$endtime."</td>";
                                        ?>
                                        <td>
                                            <form action="delete.php" method="POST">
                                                <input type="hidden" id="eventId" name="id" value="<?php echo $user_data['id']; ?>" />
                                                <input type="submit" class="text-info btn" name="delete" value="Delete"/>
                                            </form>
                                        </td>
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
    <script src="../../JS/bootstrap/bootstrap.min.js"></script>
</body>
</html>