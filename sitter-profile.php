<?php
error_reporting(0);
include "header.php";

$userdetail=mysqli_fetch_array(mysqli_query($con,"select * from `registration`  where `admin_id`='$user_id'")); 
 $userdetail['name'];
include "connection.php";

$id=$_GET['id'];


if (isset($_POST['book'])) {
	$sid = $_POST['sid'];
	if($user_id==""){
		$_SESSION['page']='sitter-profile.php?id='.$sid;
	 echo "<script> location.href='login.php' </script>";	
	}

    $calid = $_POST['calid'];
	$count=count($calid);
   
    
   
for($i=0;$i<$count;$i++){
$s1="insert into `sitter_booking`(`calid`,`userid`,`booking_date`)VALUES('$calid[$i]','$user_id',now())";
   $q1=mysqli_query($con,$s1);
		$regid=mysqli_insert_id($con);	
	$caldel=mysqli_fetch_array(mysqli_query($con,"select * from `calander`  where `calander_id`='$calid[$i]'")); 
$sitter=mysqli_fetch_array(mysqli_query($con,"select * from `registration`  where admin_id=$sid")); 

	 $to = $sitter['email'];

 $msgg="Dear Sitter , 
 ".$userdetail['name']." 
 have booked your Availability for 
 Date : ". date('M d , Y',strtotime($caldel['date']))."
 Time: ". date('h:i a',strtotime($caldel['time'])).
 " Please Login in the panel and Confirm or Reject it.

Thanks

----------
Petcare

*this email is only for Confidential Password delivery. Please do not revert back.";

$subject = "New Booking";
$txt = $msgg;
$headers = "From:Pet care<info@gsoftware.website>";
 mail($to,$subject,$txt,$headers);
	
}


	
	
	
    echo "<script>alert('Calander Update Successfuly')</script>";
    echo "<script> location.href='sitter-profile.php?id=$sid' </script>";


    /*echo "<script> location.href=''</script>";*/
}

 
		
		
		$sql=mysqli_query($con,"select * from add_sitter as t1 left join user_service as t2 on t1.reg_id=t2.user_id where reg_id=$id"); 
		
		$num1=mysqli_fetch_array($sql);
		
		?>



<div class="container-1">
  

    <div class="bg-white">
        <div class="container hero-container">
            

<div class="member-profile-hero-wrap  js-member-profile-hero-wrap">
    <div class="member-profile-hero-row row">
        <div class="col-md-4 text-center js-shared-gallery-trigger js-provider-picture-wrap" data-gallery-index="0" data-qa-id="member-profile-main-image">
            <img class="img-circle provider-thumb" alt="<?php echo $num1['name']; ?>" src="admin/userimg/<?php echo $num1['img']; ?>">
            
        </div>
        <div class="col-md-6 member-summary-col">
            <div class="provider-details-wrap">
                <h3 class="provider-name media-heading nomargin">
                    <strong><span data-qa-id="member-profile-text-sitter-name" ><?php echo $num1['name']; ?></span></strong>
                </h3>
                
    <div class="provider-neighborhood">
        <div class="h5">
        
            
                <a href="#"><?php echo $num1['address']; ?></a>
            
        
        
            
        </div>
    </div>


            </div>
            <div class="contact-wrap">

    
        <div class="inline-block margin-right-x3">
            <i class="rover-icon rover-icon-lets-chat"></i>
            <span class="text-muted">Response Rate:</span>
            <span class="lowercase">
                <strong>100%</strong>
            </span>
        </div>
    
    
        <div class="inline-block">
            <i class="rover-icon rover-icon-break-time"></i>
            <span class="text-muted">Response Time:</span>
            <span class="lowercase">
                <strong>A few minutes</strong>
            </span>
        </div>
    


                



            </div>
        </div>
        
        
        <?php if($id==$user_id & $user_type=='sitter'){ ?>
        <style>
		
		.col-md-2.profile-link {
    padding: 0 21px;
    border-left: 1px solid#1a8557 !important;
}
.update-links {
    padding: 22px 0;
    font-size: 18px;
}

</style>
        <div class="col-md-2 profile-link">
            <div class="update-links">
            <ul>
            <li><a href="update-sitter.php">Update Profile</a></li>
            <li><a href="services.php">Update services</a></li>
            <li><a href="calander.php">Update Availability</a></li>
            <li><a href="booking_detail.php">Booking Detail</a></li>
            
            
            </ul>
            </div>
            </div>
        <?php } ?>
        
        
        
        
        
    </div>
</div>

        </div>
    </div>

     
    <div class="bg-white">
    <div class="provider-services container padding-top-x8">
        <div class="row">
        
        
        <!--Left column start-->
        
        
        <div class="col-md-4 leftside">
    
<div class="services-card">
    <div class="rates-summary-wrapper">
        <div class="fluid-row v-bottom">
            <div class="fluid-col col-xs-6 padding-h-x0">
                <h2 class="services-title margin-bottom-x0">Services</h2>
            </div>
            
        </div>

        <div>
            
                
                    
<?php 
$sql3=mysqli_query($con,"select * from  user_service as t1 left join services as t2 on t1.service_id=t2.service_id   where `user_id`=$id"); 
		
		while($num3=mysqli_fetch_array($sql3)){ 
		
		
		?>
<div class="service-rate-summary margin-bottom-x2">
    <div class="title-row fluid-row v-center">
        <div class="fluid-col">
            <h3 class="h5 margin-v-x0">
               <?php echo $num3['service_name']; ?>
                
            </h3>
        </div>
        <div class="fluid-col text-right">
            
                <div class="h2 margin-v-x0">
                    <strong>
                        <span  data-qa-id="member-pages-rates-overnight-boarding"  itemprop="priceRange">
                            
                                
                                   $<?php echo $num3['price']; ?>
                                
                            
                        </span>
                    </strong>
                </div>
            
        </div>
    </div>
    
</div>

  <?php } ?>              
            
        </div>
        
        
    </div>
</div>

    
        
            <section class="dog-preferences profile-section">
    <a class="profile-section-anchor" id=""></a>
    
        <h2 class="profile-section-title h4 text-center-xs text-primary margin-top-x0 margin-bottom-x4 ">
            
    
        <?php echo $num1['name']; ?> can host
    

            <div class="section-toggle"
                 data-event-profile-section="sitting-preferences">
                <i class="rover-icon rover-icon-stepper-plus"></i>
                <i class="rover-icon rover-icon-stepper-minus"></i>
            </div>
        </h2>
    
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12 margin-bottom-x3">
            <div class="flex flex-just-start flex-wrap">
                <?php if($num1['dog_size0_15']=='yes'){ ?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 0-15 lbs">
                    <div>
                       <img src="images/dog1.png" width="30px" />
                    </div>
                    <div class="large-text">0-15</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                <?php } if($num1['dog_size16_40']=='yes'){?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 16-40 lbs">
                    <div>
                       <img src="images/dog2.png" width="30px" />
                    </div>
                    <div class="large-text">16-40</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                  <?php } if($num1['dog_size41_100']=='yes'){?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 41-100 lbs">
                    <div>
                       <img src="images/dog3.png" width="30px" />
                    </div>
                    <div class="large-text">41-100</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                <?php } ?>
            </div>
        </div>
        
            <div class="col-xs-12 col-sm-6 col-md-12 additional-preferences">
                <ul class="list-unstyled">
                    
                        <li>
                            

                        </li>
                    
                </ul>
            </div>
        
    </div>

</section>

        
    
    
        
            <section class="dog-preferences profile-section">
    <a class="profile-section-anchor" id=""></a>
    
        <h2 class="profile-section-title h4 text-center-xs text-primary margin-top-x0 margin-bottom-x4 ">
            
    
        <?php echo $num1['name']; ?> can watch in your home
    

            <div class="section-toggle"
                 data-event-profile-section="sitting-preferences">
                <i class="rover-icon rover-icon-stepper-plus"></i>
                <i class="rover-icon rover-icon-stepper-minus"></i>
            </div>
        </h2>
    
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-12 margin-bottom-x3">
            <div class="flex flex-just-start flex-wrap">
                  <?php  if($num1['watch_dog_size0_15']=='yes'){?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 0-15 lbs">
                    <div>
                        <img src="images/dog1.png" width="30px" />
                    </div>
                    <div class="large-text">0-15</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                 <?php } if($num1['watch_dog_size16_40']=='yes'){?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 16-40 lbs">
                    <div>
                        <img src="images/dog2.png" width="30px" />
                    </div>
                    <div class="large-text">16-40</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                 <?php  } if($num1['watch_dog_size41_100']=='yes'){?>
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 41-100 lbs">
                    <div>
                        <img src="images/dog3.png" width="30px" />
                    </div>
                    <div class="large-text">41-100</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                <?php } ?>
            </div>
        </div>
        
    </div>
    
<form method="post" target="">
            <div class="section-row title-row">
    <div class="section-col-main">
        <div class="margin-top-x0 margin-bottom-x6 text-center-xs">
            <div class="title">
            <?php  if($id!=$user_id){ ?>
               <h4> Select Availble Time </h4>
               <?php }else{  ?>
               
                <h4> Your Availability </h4>
               <?php } ?>
            </div>
            <style>
			
			.col-md-4.text-center.js-shared-gallery-trigger.js-provider-picture-wrap img {
    width: 50%;
    height: 165px;
}
			.col-md-8.services-details {
    padding-left: 40px;
    text-align: justify;
   
}
			.fluid-row.v-bottom, .fluid-row.v-center {
    height: 100%;
    margin-bottom: 20px;
}
			.col-md-4.leftside {
    box-shadow: 0 0 8px -5px #000;
}
.profile-section-title p {
    font-size: 14px;
}
.title {
    font-size: 18px;
}
.services-title.margin-bottom-x0 {
    font-size: 24px;
    width: 70%;
    border-bottom: 4px solid #1a8557;
	color: #1a8557;
    /* text-align: center; */
}
			input.chk-btn {
  display: none;
}
input.chk-btn + label {
 border: 1px solid #f3efef;
    background: ghoswhite;
    padding: 1px 8px;
    cursor: pointer;
    border-radius: 0px;
    font-size: 14px;
}

input.chk-btn:not(:checked) + label:hover {
  box-shadow: 0px 1px 3px;
}
input.chk-btn + label:active,
input.chk-btn:checked + label {
  box-shadow: 0px 0px 3px inset;
  background: #eee;
}
input[type="submit"] {
    background: #000;
    border: none;
    width: 140px;
    height: 30px;
}
.col-md-2.date {
    font-size: 18px;
    padding: 0px 0;
	font-weight:700;
	color: #1a8557;
}
.col-md-3.time {
    padding: 0px !important;
    margin: 0px !important;
}
form {
    width: 100%;
    height: auto;
    float: left;
    background: #1a8557;
    padding: 10px;
    color: #fff;
    text-align: center;
	margin-bottom: 60px;
}
	
	.h2.margin-v-x0 {
    font-size: 16px;
}
h3.h5.margin-v-x0 {
    font-size: 15px;
}
h2.profile-section-title.h4.text-center-xs.text-primary.margin-top-x0.margin-bottom-x4 {
    font-size: 16px;
}
			</style>
         <?php 
		 
		
		 $todaydate=date('Y-m-d');
$sqld=mysqli_query($con,"select * from  calander  where `sitter_id`='$id' and `status`='0' and date>='$todaydate'   group by date"); 
		
		while($numd=mysqli_fetch_array($sqld)){ 
		$datee=$numd['date'];?>
		
		<div class="col-md-4 date">
         
      <?php echo date('M d,Y',strtotime($datee)) ?> :  </div>
		
		
		
		<?php $sqlt=mysqli_query($con,"select * from  calander  where `sitter_id`='$id' and `date`='$datee' and `status`='0'"); 
		$countcal=0;
		while($numt=mysqli_fetch_array($sqlt)){ 
		
		$timeid=$numt['calander_id'];
		$countcal++;
		?>
            
         <div class="col-md-3 time">
         
    <input type="hidden" name="sid" value="<?php echo $id; ?>" />
     
      <input type="checkbox" id='<?php echo $timeid ?>' name="calid[]"   value="<?php echo $timeid ?>" class='chk-btn' />
<label for='<?php echo  $timeid;   ?>'><?php echo  date('h:i a',strtotime( $numt['time']));   ?></label>
</div>        
         
         
         <?php }?>
		 
		<div class="col-md-12"> <br /> </div>
		 
		 <?php } ?>   
        </div>
        <div class="col-md-12"> 
        <?php  if($id!=$user_id and $countcal>0 ){ ?>
        <input type="submit" name="book" value="Book Now" />
         <?php } ?>
        </div>
    </div>
</div>
            
 </form>
 

 
</section>

        
    
    

</div>
        <!--Middle Box Start -->
            <div class="col-md-8 services-details ">
            
            
            
            
                       
            
            <div class="col-md-12"> <br /> </div>
                
                    <div class="section-row title-row">
    <div class="section-col-main">
        <h3 class="margin-top-x0 margin-bottom-x6 text-center-xs profile-section-title">
            <div class="title">
                About <?php echo $num1['name']; ?> 
            </div>
            
        </h3>
    </div>
</div>
     <div class="section-row content-row margin-bottom-x4">
        <div class="section-col-main">
            <div class="profile-section-title"><p><?php echo $num1['about']; ?></p></div>
        </div>
    </div>               
                    
     
     
     <section class=" profile-section">
    <a class="profile-section-anchor" id=""></a>
    
    <div class="section-row">
        <div class="section-col-main">
            
        <h2 class="profile-section-title h4 text-center-xs text-primary margin-top-x0 margin-bottom-x4 ">
            
    
        
            About <?php echo $num1['name']; ?>'s Home
        
    

            <div class="section-toggle"
                 data-event-profile-section="">
                <i class="rover-icon rover-icon-stepper-plus"></i>
                <i class="rover-icon rover-icon-stepper-minus"></i>
            </div>
        </h2>
    
        </div>
    </div>

    
    <div class="section-row">
        <div class="section-col-meta text-center-xs">
            
        </div>
        <div class="section-col-main">
            
    
    
        <div class="row margin-bottom-x4">
            <div class="col-sm-6">
                
                    
 <?php if($num1['has_house']=='yes'){?>                       
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
      <?php if($num1['has_house']=='yes'){   echo "Lives in an House"; } ?>
    </div>
</div>
                    
  <?php } ?>              
                    
                
                    
 <?php if($num1['has_fanced_yard']=='yes'){ ?>                      
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
    <?php if($num1['has_fanced_yard']=='yes'){   echo "Have a Yard"; }else{ echo "Does Not Have a Yard";   } ?>
        
    </div>
</div>


<?php } ?>


<?php if($num1['has_no_child']=='yes'){ ?>



<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
      <?php if($num1['has_no_child']=='yes'){   echo "No Children Present"; }else{ echo "Have Children";   } ?>
    </div>
</div>
<?php } ?>
<?php if($num1['total_pet']=='0'){ ?>
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
      <?php if($num1['total_pet']=='0'){   echo "No Own Pets"; }else{ echo "Has ".$num1['total_pet']." Dogs";   } ?>
    </div>
</div>
   <?php } ?>                 
                
          
                    
                
                    
    <?php if($num1['non_smoking_home']=='yes'){   ?>
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
    <?php if($num1['non_smoking_home']=='yes'){   echo "Non-Smoking Household"; }else{ echo "Smoking Household";   } ?>
       
    </div>
</div>
                    
       <?php } ?>         
                    
                
            </div>
        </div>
    

    

        </div>
    </div>

</section>
     
     
                    


<div class="section-row title-row">
    <div class="section-col-main">
        <h3 class="margin-top-x0 margin-bottom-x6 text-center-xs profile-section-title">
            <div class="title">
                When <?php echo $num1['name']; ?> watches your pet
            </div>
            <div class="section-toggle" data-event-profile-section="members-sitting-type">
                <i class="rover-icon rover-icon-stepper-plus"></i>
                <i class="rover-icon rover-icon-stepper-minus"></i>
            </div>
        </h3>
    </div>
</div>



    <!--<div class="section-row content-row margin-bottom-x4">
        <div class="section-col-main">
            <div class="profile-section-title"><p><?php echo $num1['about']; ?></p></div>
        </div>
    </div>-->


<section class=" profile-section">
    <a class="profile-section-anchor" id=""></a>
    
    <div class="section-row">
        <div class="section-col-main">
            
        <h2 class="profile-section-title h4 text-center-xs text-primary margin-top-x0 margin-bottom-x4 ">
            
    
        
            In <?php echo $num1['name']; ?>'s Home
        
    

            <div class="section-toggle"
                 data-event-profile-section="">
                <i class="rover-icon rover-icon-stepper-plus"></i>
                <i class="rover-icon rover-icon-stepper-minus"></i>
            </div>
        </h2>
    
        </div>
    </div>

    
    <div class="section-row">
        <div class="section-col-meta text-center-xs">
            
        </div>
        <div class="section-col-main">
            
    
    
        <div class="row margin-bottom-x4">
            <div class="col-sm-6">
                
                    
    <?php if($num1['dogs_allowed_on_furniture']=='yes'){?>                    
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
     <?php if($num1['dogs_allowed_on_furniture']=='yes'){   echo "Dogs Allowed On Furniture"; }else{ echo "Dogs Does not Allowed On Furniture";   } ?>
        
    </div>
</div>
                    
   <?php } ?>             
                    
                
                    
 <?php if($num1['dogs_allowed_on_bed']=='yes'){?>                       
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
     <?php if($num1['dogs_allowed_on_bed']=='yes'){   echo "Dogs Allowed On Bed"; }else{ echo "Dogs Does not Allowed On Bed";   } ?>
       
    </div>
</div>
                    
    <?php } ?>            
            
                
                    
                
                    
                        
<div class="provider-attribute media">
    <div class="pull-left icon">
        <i class="rover-icon rover-icon-thin-check"></i>
    </div>
    <div class="media-body">
        Potty Breaks Every 2-4 Hours
    </div>
</div>
                    
                
                    
                
            </div>
        </div>
    

    

        </div>
    </div>

</section>




                
            </div>
            
            
            
            <!--RFight Column Start-->
            
            
            
            
            
            
        </div>
    </div>
</div>


    
  </div>
