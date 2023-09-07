<?php

include "connection.php";

if(isset($_POST['request'])){
    $request = $_POST['request'];
    $coming_events = mysqli_query($mysqli, "SELECT *
        FROM events
        INNER JOIN artists ON events.artist_id=artists.id
        WHERE events.date between CURDATE() and DATE_ADD(CURDATE(), INTERVAL 6 MONTH)
        ORDER BY ".$request." ASC ");
    
    while($event_data = mysqli_fetch_array($coming_events)){
       
?>
<div class="col-lg-6">
    <div class="row" style="row-gap:15px;">
        <div class="col-md-6">
            <img src="./Images/<?php echo $event_data['image']; ?>" class="up-img">
        </div>
        <div class="col-md-6">
            <h3><?php echo $event_data['title']; ?> by <span class="text-info"><?php echo $event_data['artist_name']; ?></span></h3>
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
}
?>


