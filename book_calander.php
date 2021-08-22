<?php
error_reporting(0);
include "header.php";
include "connection.php";

$id=$_GET['id'];

if($user_id==""){
	echo "<script> location.href='login.php' </script>";
	
}

 
		
		
		$sql=mysqli_query($con,"select * from add_sitter as t1 left join user_service as t2 on t1.reg_id=t2.user_id where reg_id=$id"); 
		
		$num1=mysqli_fetch_array($sql);
		
		
		
		if (isset($_POST['sub3'])) {

    $date = $_POST['date'];
    $time = $_POST['time'];
	$sitterid = $_POST['sitter_id'];
	
    
   
		 $s1="update `calander` set  `booked_by`='$user_id',`status`='1' where `sitter_id`='$sitterid' and `date`='$date' and `time`='$time'";
   $q1=mysqli_query($con,$s1);
		$regid=mysqli_insert_id($con);
	
    echo "<script>alert('Sitter booked Successfuly')</script>";
    echo "<script> location.href='index.php' </script>";
		}
		?>



<div class="container-1">
  

    <div class="bg-white">
        <div class="container hero-container">
            

<div class="member-profile-hero-wrap  js-member-profile-hero-wrap">
    <div class="member-profile-hero-row row">
        <div class="col-md-4 text-center js-shared-gallery-trigger js-provider-picture-wrap" data-gallery-index="0" data-qa-id="member-profile-main-image">
            <img class="img-circle provider-thumb" alt="<?php echo $num1['name']; ?>" src="admin/userimg/<?php echo $num1['img']; ?>">
        </div>
        <div class="col-md-8 member-summary-col">
            <div class="provider-details-wrap">
                <h1 class="provider-name media-heading nomargin">
                    <strong><span data-qa-id="member-profile-text-sitter-name" ><?php echo $num1['name']; ?></span></strong>
                </h1>
                
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
    


                

<div class="contact-favorite-wrap fixed-contact-button">
    <div class="contact-btn-col">
        <div>
            
              <a href="# " rel="nofollow">
                
               <?php echo $num1['name']; ?>
                
              </a>
            
        </div>
    </div>
    
</div>

            </div>
        </div>
    </div>
</div>

        </div>
    </div>

     
    <div class="bg-white">
    <div class="provider-services container padding-top-x8">
        <div class="row">
        <div class="col-md-4">
    
<div class="services-card">
    <div class="rates-summary-wrapper">
        <div class="fluid-row v-bottom">
            <div class="fluid-col col-xs-6 padding-h-x0">
                <h2 class="services-title margin-bottom-x0">Services</h2>
            </div>
            
        </div>

        <div>
            
                
                    

<div class="service-rate-summary margin-bottom-x2">
    <div class="title-row fluid-row v-center">
        <div class="fluid-col">
            <h3 class="h5 margin-v-x0">
                Boarding
                
            </h3>
        </div>
        <div class="fluid-col text-right">
            
                <div class="h2 margin-v-x0">
                    <strong>
                        <span  data-qa-id="member-pages-rates-overnight-boarding"  itemprop="priceRange">
                            
                                
                                    $45
                                
                            
                        </span>
                    </strong>
                </div>
            
        </div>
    </div>
    <div class="subtext-row fluid-row">
        <div class="fluid-col">
            <div class="text-muted">
                in the sitter&#39;s home
            </div>
        </div>
        <div class="fluid-col text-right">
            <div class="text-muted">
                
                    per night
                
            </div>
        </div>
    </div>
</div>

                
            
                
                    

<div class="service-rate-summary margin-bottom-x2">
    <div class="title-row fluid-row v-center">
        <div class="fluid-col">
            <h3 class="h5 margin-v-x0">
                House Sitting
                
            </h3>
        </div>
        <div class="fluid-col text-right">
            
                <div class="h2 margin-v-x0">
                    <strong>
                        <span  data-qa-id="member-pages-rates-overnight-traveling"  itemprop="priceRange">
                            
                                
                                    $65
                                
                            
                        </span>
                    </strong>
                </div>
            
        </div>
    </div>
    <div class="subtext-row fluid-row">
        <div class="fluid-col">
            <div class="text-muted">
                in your home
            </div>
        </div>
        <div class="fluid-col text-right">
            <div class="text-muted">
                
                    per night
                
            </div>
        </div>
    </div>
</div>

                
            
                
                    

<div class="service-rate-summary margin-bottom-x2">
    <div class="title-row fluid-row v-center">
        <div class="fluid-col">
            <h3 class="h5 margin-v-x0">
                Doggy Day Care
                
            </h3>
        </div>
        <div class="fluid-col text-right">
            
                <div class="h2 margin-v-x0">
                    <strong>
                        <span  data-qa-id="member-pages-rates-doggy-day-care"  itemprop="priceRange">
                            
                                
                                    $40
                                
                            
                        </span>
                    </strong>
                </div>
            
        </div>
    </div>
    <div class="subtext-row fluid-row">
        <div class="fluid-col">
            <div class="text-muted">
                in the sitter&#39;s home
            </div>
        </div>
        <div class="fluid-col text-right">
            <div class="text-muted">
                
                    per day
                
            </div>
        </div>
    </div>
</div>

                
            

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
                
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 0-15 lbs">
                    <div>
                       <img src="images/dog1.png" width="30px" />
                    </div>
                    <div class="large-text">0-15</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 16-40 lbs">
                    <div>
                       <img src="images/dog2.png" width="30px" />
                    </div>
                    <div class="large-text">16-40</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                
                <div class="flex-align-self-end col-xs-4 text-center"
                     title="Accepts dogs 41-100 lbs">
                    <div>
                       <img src="images/dog3.png" width="30px" />
                    </div>
                    <div class="large-text">41-100</div>
                    <div class="text-muted small-text" >lbs</div>
                </div>
                
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

        
    
    
        
            

        
    
    

</div>
        
            <div class="col-md-8 services-details ">
                
                    
               <h3>Please Select Booking Date and Time</h3>     
                    
     <div class="col-md-12 clearfix mb-30 -bg padding-between ">
                      <div class="ticker col-md-9 col-md-offset-1 ">
                        
                          
                          <!--name-->
                          <div class="form-group">
                           
                            <?php $query=mysqli_query($con,"select * from calander where `status`!=1 and `sitter_id`='$id'");
                                while($row=mysqli_fetch_array($query))
                                {?>
                                 <div class="col-md-12">
                                <form class="appoinment-form" method="post">
                            <div class="col-md-4">
                                <input type="text" readonly="readonly" value="<?php echo $row['date'];?>" name="date" />
                                </div>
                                <div class="col-md-4">
                                <input type="text"  readonly="readonly" value="<?php echo $row['time'];?>" name="time" />
                                 <input type="hidden" name="sitter_id" value="<?php echo $id ?>" />
                                </div>
                                <div class="col-md-4">
                                <button class="mt-20 btn-red-submit " type="submit" name="sub3"> Book Now </button>
                                </div>
</form>
</div>
                                <?php } ?>
                            
                            
                            
                            
                                                            
                              
                            </div>
                          </div>
                          
     
     
                    






    







                
            </div>
            
        </div>
    </div>
</div>


    
  </div>
