
<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
$userdetail=mysqli_fetch_array(mysqli_query($con,"select * from `registration`  where `admin_id`='$user_id'"));

 $status=$_GET['value'];
$id=$_GET['id'];
if($id!=""){
$sbook=mysqli_fetch_array(mysqli_query($con,"select * from `sitter_booking`  where `sbookingid`='$id'"));
$cid=$sbook['calid'];

if($status=='confirm'){
	
	$caldel=mysqli_fetch_array(mysqli_query($con,"select * from `calander`  where `calander_id`='$cid'"));
$s1="update `calander` set `status`='1' where `calander_id`='$cid'";
   $q1=mysqli_query($con,$s1);	
   $s1=mysqli_query($con,"update `sitter_booking` set `booking_status`='confirm' where `sbookingid`='$id'");
   
  
   $caldetail=mysqli_fetch_array(mysqli_query($con,"select t2.email from sitter_booking as t1 left join registration as t2 on t1.userid=t2.admin_id where t1.calid='$cid'  "));
   
   
   
   
 $to = $caldetail['email'];

 $msgg="Dear Petcare User ,
".$userdetail['name']." have Confirm your Booking on Petcare for.
Date : ". date('M d , Y',strtotime($caldel['date']))."
 Time: ". date('h:i a',strtotime($caldel['time']))."
 
Thanks

----------
Petcare

*this email is only for Confidential Password delivery. Please do not revert back.";

$subject = " Booking Confirmed";
$txt = $msgg;
$headers = "From:Pet care<info@gsoftware.website>";
 mail($to,$subject,$txt,$headers);
   
   
   
   
   
	
}else if($status=='reject'){
	$caldel=mysqli_fetch_array(mysqli_query($con,"select * from `calander`  where `calander_id`='$cid'"));
	
	
   $s1=mysqli_query($con,"update `sitter_booking` set `booking_status`='Denied' where `sbookingid`='$id'");
   
   $caldetail=mysqli_fetch_array(mysqli_query($con,"select t2.email from sitter_booking as t1 left join registration as t2 on t1.userid=t2.admin_id where t1.calid='$cid'  "));
   
   
   
   
   
 $to = $caldetail['email'];

 $msgg="Dear Petcare User ,
".$userdetail['name']." Has  Denied your Booking on Petcare for
Date : ". date('M d , Y',strtotime($caldel['date']))."
 Time: ". date('h:i a',strtotime($caldel['time']))."

 Please Check another Availability and book again.

Thanks

----------
Petcare

*this email is only for Confidential Password delivery. Please do not revert back.";

$subject = " Booking Reject";
$txt = $msgg;
$headers = "From:Pet care<info@gsoftware.website>";
 mail($to,$subject,$txt,$headers);
   
   
}
}

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
        
        <div class="join-heading text-heading mb-20 ">Booking Detail</div>
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
                    <div class="col-md-2 booking-hd">Booking By </div>
                    <div class="col-md-2 booking-hd">Mobile </div>  
                    <div class="col-md-3 booking-hd">Option </div>      
                            
                            <?php $query=mysqli_query($con,"select * from sitter_booking as t1 left join registration as t2 on t1.userid=t2.admin_id left join calander as t3 on t1.calid=t3.calander_id where t3.sitter_id=$user_id ");
                                while($row=mysqli_fetch_array($query))
                                {?>
                                
                                <div class="col-md-2 booking-detail"><?php echo date('M d,Y',strtotime($row['date'])); ?> </div>
                    <div class="col-md-2 booking-detail"><?php echo date('h:i a',strtotime($row['time'])); ?> </div>
                     
                      <div class="col-md-2 booking-detail"><?php if($row['name']==""){ echo '--'; }else{ echo $row['name']; }?> </div>
                       <div class="col-md-2 booking-detail"><?php if($row['contact']==""){ echo '--'; }else{ echo $row['contact']; }?> </div>
                          <div class="col-md-3 booking-detail">
                          <?php if($row['booking_status']=='Pending'){ ?>
                          <a href="booking_detail.php?value=confirm&id=<?php echo $row['sbookingid'] ?>">Confirm</a> &nbsp; <a href="booking_detail.php?value=reject&id=<?php echo $row['sbookingid']?>">Denied</a> 
                          <?php }else{ ?>
                          
                          <?php echo $row['booking_status']?>
                          <?php } ?>
                          
                          
                          
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