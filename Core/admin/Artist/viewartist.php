<?php
// Create database connection 
include_once("../../connection.php");

// Fetch all artist data from database
$result = mysqli_query($mysqli, "SELECT * FROM artists ORDER BY id ASC");

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

        <title>Admin | View Artist</title>
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
                                    <a href="../Event/viewevents.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Events</a>
                                </li>
                                <li>
                                    <a href="../Event/addevent.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-calendar-plus"></i> <span class="d-none d-sm-inline">Add Event</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle text-white">
                                <i class="fas fa-user-alt"></i><span class="d-none d-sm-inline" style="padding-left: 15px;">Manage Artists</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="viewartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-eye"></i> <span class="d-none d-sm-inline">View Artists</a>
                                </li>
                                <li>
                                    <a href="addartist.php" class="nav-link pr-0 pl-3 text-white"><i class="fa-solid fa-user-plus"></i> <span class="d-none d-sm-inline">Add Artist</a>
                                </li>
                            </ul>
                        </li>
                        <hr>
                        
                    </ul>
                </div>
            </div>
            <div class="col py-3 content-area">
                
                <div class="row justify-content-center">
                   
                    <div class="col-lg-10 ">
                        <div class="text-end w-100 mb-5">
                            <h3>Welcome Admin!</h3>
                        </div>
                
                        <div class="mt-5 d-flex justify-content-between align-items-center">
                            <h3 class="">Artist List</h3>
                            <button class="btn btn-dark"><a href="addartist.php" class="text-white text-decoration-none">Add artist</a></button>
                        </div>
                        <div class="mt-5 table-responsive">
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Biography</th>
                                    <th scope="col">Facebook</th>
                                    <th scope="col">Instagram</th>
                                    <th scope="col">Twitter</th>
                                    
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $i=1;
                                    while($user_data = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>".$i."</td>";
                                        ?>
                                        <td>
                                            <img src="../../Images/<?php echo $user_data['artist_image']; ?>" width="50" height="50" class="rounded-circle object-fit-cover" style="max-width:50px;">
                                        </td>
                                        <?php
                                        echo "<td>".$user_data['artist_name']."</td>";
                                        echo "<td>".$user_data['biography']."</td>";
                                        echo "<td>".$user_data['facebook']."</td>";
                                        echo "<td>".$user_data['instagram']."</td>";
                                        echo "<td>".$user_data['twitter']."</td>";
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