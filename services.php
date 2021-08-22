
<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
if (isset($_POST['sub3'])) {

    $service_type = $_POST['service_type'];
    $price = $_POST['price'];
    
   


$s1="insert into `user_service`(`service_id`,`price`,`user_id`)VALUES('$service_type','$price','$userid')";
   $q1=mysqli_query($con,$s1);
		$regid=mysqli_insert_id($con);
	
	
	
    echo "<script>alert('Calander Update Successfuly')</script>";
    echo "<script> location.href='services.php' </script>";


    /*echo "<script> location.href=''</script>";*/
}


//on submit insert data
$del_id=$_GET['del_id'];
	if($del_id){
			$sql1="delete from `user_service` where `user_ser_id`='$del_id'";
			$result1 = mysqli_query($con,$sql1);
			if($result1){
				echo "<script>alert('Data Deleted Successfully');</script>";
				echo "<script> location.href='services.php' </script>";
			}
		}


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
        
        <div class="join-heading text-heading mb-20 ">Update Your Services</div>
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
                            Service <br>
                             <select name="service_type" class="form-control">
   <?php 
                                            $sql=mysqli_query($con,"select * from `services` ");
											while($num=mysqli_fetch_array($sql)){
												
												
                                            ?>
  <option value="<?php echo $num['service_id']; ?>"> <?php echo $num['service_name']; ?></option>
  
  <?php } ?>
  </select>
                            </div>
                            
                            <div class="col-md-5">
                            Price 
                             <input class="form-control " style="margin-top:0px" placeholder="" type="text"  name="price" required>
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
                  
                  <div class="col-md-4 booking-hd">Service </div>
                    <div class="col-md-4 booking-hd">Price </div> 
                    <div class="col-md-4 booking-hd">Option </div>
                          
                            
                            <?php $query=mysqli_query($con,"select * from user_service as t1 left join `services` as t2 on t1.service_id=t2.service_id where user_id=$user_id");
                                while($row=mysqli_fetch_array($query))
                                {?>
                                
                                <div class="col-md-4 booking-detail"><?php echo $row['service_name']; ?> </div>
                    <div class="col-md-4 booking-detail"><?php echo $row['price']; ?> </div>
                     
                      <div class="col-md-4 booking-detail"><a href="services.php?del_id=<?php echo $row['user_ser_id']; ?>">Delete</a> </div>
                      
                                
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