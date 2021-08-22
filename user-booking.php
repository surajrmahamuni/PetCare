
<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
if (isset($_POST['sub3'])) {

    $date = $_POST['date'];
    $time = $_POST['time'];
    
   


$s1="insert into `calander`(`date`,`time`,`sitter_id`,`booked_by`,`status`)VALUES('$date','$time','$userid','','')";
   $q1=mysqli_query($con,$s1);
    $regid=mysqli_insert_id($con);
  
  
  
    echo "<script>alert('Calander Update Successfuly')</script>";
    echo "<script> location.href='calander.php' </script>";


    /*echo "<script> location.href=''</script>";*/
}


//on submit insert data


?>

<body>
<div id="preloader" style="display: none;"> <span class="margin-bottom"><img
            src="images/loader.gif" alt=""></span> </div>

<!--  HEADER -->


<!-- end main-header  --> 

<!--login and regiter strt here-->
<section class="section-appointment">
  <div class="container wow fadeInUp" style="visibility: hidden; animation-name: none;">
  <div class="row"> 
    <!--about-->
    <div class="col-md-10 col-md-offset-1  mt-30">
      <div class=" clearfix mb-30 "> 
        <!--<h4 class="join-heading padding-left-30">Make Donor</h4>-->
        
        <div class="join-heading text-heading mb-20 ">Booking  Calander Detail</div>
        <div class="tab" role="tabpanel">
          <div class="panel panel-default">
            <div class="panel-body"> 
              
              <!-- Tab panes -->
              <div class="tab-content tabs"> 
                
                <!--tab data #1 start here-->
                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                  
                  <!--tab data #3 start here--> 
                  <div class="table">
                  
                  <div class="col-md-2 booking-hd">Date </div>
                    <div class="col-md-2 booking-hd">Time </div> 
                    <div class="col-md-2 booking-hd">Sitter Name </div>
                    <div class="col-md-2 booking-hd">Mobile </div>  
                    <div class="col-md-3 booking-hd">Status </div>      
                            
                            <?php
            
              
               $query=mysqli_query($con,"select * from sitter_booking as t1 left join registration as t2 on t1.userid=t2.admin_id left join calander as t3 on t3.calander_id=t1.calid where t1.userid='$user_id'");
                                while($row=mysqli_fetch_array($query)){
                
                  $sitterid=sittername($row['sitter_id'],$con);
                  ?>
                                
                                <div class="col-md-2 booking-detail"><?php echo $row['date']; ?> </div>
                    <div class="col-md-2 booking-detail"><?php echo $row['time']; ?> </div>
                     
                      <div class="col-md-2 booking-detail"><?php if($sitterid==""){ echo '--'; }else{ echo $sitterid; }?> </div>
                       <div class="col-md-2 booking-detail"><?php if($row['contact']==""){ echo '--'; }else{ echo $row['contact']; }?> </div>
                        <div class="col-md-3 booking-detail"><?php
						 if($row['booking_status']==""){ echo '--'; 
						}else{ 
						
						if($row['booking_status']=='confirm'){
						echo 'Confirmed by Sitter'; }else if($row['booking_status']=='Denied'){ echo 'Denied by Sitter';   }else{ echo $row['booking_status'];   }
						
						}
						
						?>
                        
                        
                        
                        
                         </div>
                                
                                <?php } ?>
                            
                            </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--  end .row  --> 
    
  </div>
  <!--  end .container --> 
</section>
<!--login and egister end here--> 

<!-- START FOOTER  --> 

<!-- END FOOTER  --> 

<!-- Back To Top Button  --> 

<script src="js/bootstrap.js"></script> 
<!--counter and in more--> 
<script src="js/wow.js"></script> 
<script src="js/backtotop.js"></script> 
<!--use in paralex effct bg--> 
<script src="js/waypoints.js"></script> 
<!--use in gallery--> 
<script src="js/waypoints-sticky.js"></script> 
<!--<script src="js/owl.js"></script>--> 
<!--<script src="js/jquery_002.js"></script>--> 
<script src="js/counter-strip.js"></script> 
<script src="js/gallery.js"></script> 
<script src="js/custom-scripts.js"></script>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=333504350007141';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>