
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
        
        <div class="join-heading text-heading mb-20 ">Update Calander</div>
        <div class="tab" role="tabpanel">
          <div class="panel panel-default">
            <div class="panel-body"> 
              
              <!-- Tab panes -->
              <div class="tab-content tabs"> 
                
                <!--tab data #1 start here-->
                <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                  <div class="">
                    <div class="col-md-12 clearfix mb-30 -bg padding-between ">
                      <div class="ticker col-md-9 col-md-offset-1 ">
                        <form class="appoinment-form" method="post">
                          
                          <!--name-->
                          <div class="form-group">
                           
                            <div class="col-md-5">
                            Date <br>
                              <input class="form-control "  type="date" name="date" required>
                            </div>
                            
                            <div class="col-md-5">
                            Time <br>
                             <input class="form-control " placeholder="" type="time"  name="time" required>
                            </div>
                            <div class="col-md-2">
                            
                             <button class="mt-20 btn-red-submit " type="submit" name="sub3"> Save </button>
                            </div>
                            
                          </div>
                          <!--User name-->
                          
                          
                          <!--submit button-->
                          <div class="form-group  desktop-center mobile-center">
                            
                            
                            
                            
                            
                            
                            
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--tab data #3 start here--> 
                  <div class="table">
                  
                  <div class="col-md-3 booking-hd">Date </div>
                    <div class="col-md-3 booking-hd">Time </div> 
                    <div class="col-md-3 booking-hd">Booking By </div>
                    <div class="col-md-3 booking-hd">Mobile </div>       
                            
                            <?php 
							$todaydate=date('Y-m-d');
							
							$query=mysqli_query($con,"select * from calander as t1 left join registration as t2 on t1.booked_by=t2.admin_id where t1.sitter_id='$user_id' and date>='$todaydate' ");
                                while($row=mysqli_fetch_array($query))
                                {?>
                                
                                <div class="col-md-3 booking-detail"><?php echo date('M d , Y',strtotime($row['date'])); ?> </div>
                    <div class="col-md-3 booking-detail"><?php echo date('h:i a',strtotime($row['time'])) ; ?> </div>
                     
                      <div class="col-md-3 booking-detail"><?php if($row['name']==""){ echo '--'; }else{ echo $row['name']; }?> </div>
                       <div class="col-md-3 booking-detail"><?php if($row['mobile']==""){ echo '--'; }else{ echo $row['mobile']; }?> </div>
                                
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