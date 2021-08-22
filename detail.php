<?php
session_start(); 
  $userid=$_SESSION['user_id']; 
  
  $place=$_SESSION['place'];
  
?>
      <style>
#map-canvas {
	height: 0%;
	width: 0%;
	margin-left: 60%;
	margin-top: 100px;
	margin-right: 40px;
	padding: 0;
}
</style>




      <?php
 include "connection.php";
 include "function.php";
 $pagee="detail";
   //$add1=$_GET['add1'];
//   $add2=$_GET['add2'];
//   $add3=$_GET['add3'];
//   $add4=$_GET['add4'];
if(isset($_POST['sub']))
{
  $place=$_POST['place'];
   $_SESSION['place']=$place;
   $a= explode(" ",$place);
     $add1=$a[0];
   $add2=$a[1];
    $add3=$a[2];
   $add4=$a[3];
   /*echo "<script>location.href='detail.php?add1=$add1&add2=$add2&add3=$add3&add4=$add4'</script>";*/
   
}
$id=$userid;


$sqlpic="select * from `registration` ";
  $querypic=mysql_query($sqlpic);
  $numpic=mysql_fetch_array($querypic);
  
  
  

	if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;

	$setLimit = 1;
	$pageLimit = ($page * $setLimit) - $setLimit;


?>
      <!DOCTYPE html>
      <html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Explore wide</title>
<!-- Bootstrap -->

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/venobox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/styles.css">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="ddmenu/ddmenu.css" rel="stylesheet" type="text/css" />
<script src="ddmenu/ddmenu.js" type="text/javascript"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<?php 
       $add = urlencode($place);
       $city = urlencode($place);
       $state = urlencode($place);
       $country  = urlencode($place);
      
       $geocode=@file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$add.',+'.$city.',+'.$state.',+'.$country.'&sensor=false');
       $output= json_decode($geocode); //Store values in variable
       "Latitude : ".$lat = $output->results[0]->geometry->location->lat; //Returns Latitude
       echo "<br/>";
       "Longitude : ".$long = $output->results[0]->geometry->location->lng; // Returns Longitude
    ?>

   
   
   
   
   
   
    
    
    
</head>

<body onLoad="getLocation();initialize1()">
<div class="row-fluid-two">
  <div class="main-top-hdr">
    <div class="container">
      <div class="header-top-two">
        <div class="main-logo-details"> <a href="index.php"> <img class="top" src="images/logo-2.png" /></a> </div>
        <div class="main-search-container-two">
          <div class="contacts-section-two">
          
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
            <form name="form1" method="post" action="detail.php">
              <div class="search-main-section-two">
                <div class="inner-container-all-section-two">
                  
                  <div id="man-icon-two"> <img src="img/men-logo.png" alt="men-logo"> </div>
                  <div class="right-people-two-22">
                    <div class="people-text-two-22"> </div>
                    <div class="main-people-right-two"> <span id="where-icon"> </span>
                      <!--<input type="text" name="place" placeholder="Where" required class="city-state-name-two" onfocus="geolocate()" value="<?php echo $place ?>" id="location">-->
                       <input type="text" name="place" placeholder="Where" required class="city-state-name-two" id="autocomplete" onfocus="geolocate()" >
                      
                      
                    </div>
                  </div>
                  <div class="search-button-two">
                    <input type="submit" name="sub" value="Search">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        
        
    
        
        
        <div class="col-md-2 col-sm-12 text-center">
                    <!--quick links start here-->
                    <div class="">
                        <ul class="list-inline">
                            <!--<li >-->
                            <!--<i class="fa fa-phone"></i><a href="#">Quik Heal</a>-->
                            <!--</li>-->
                            <li class="clr-gray-light-text">
                                <a href="#"><i class="fa fa-sign-in"></i>Login</a>

                            </li>
                            <li class="clr-gray-light-text">
                                <a href="#"><i class="fa fa-user"></i>Signup</a>

                            </li>
                        </ul>
                    </div>
                    <!--quick links end here-->
                </div>
         
        </div>
      </div>
    </div>
  </div>
  <!--/span--> 
  
  <!--/row-->
  <div class="container">
    <div class="main-aftr-top">
      <div class="people-dtl-left-one">
        <?php  if($category!=""){  ?>
						         <h2>  <strong>Related Category</strong></h2>
						           <div class="left-list-one">
								     <ul>
                                     
									  <li><img width="8px" height="8px" src="images/gallery_2.jpg">
									  
									 </a></li>
									  
									  
									
									 </ul>
								   </div>
                                   
                                   
                                   <?php }  ?>
        
       
      </div>
      <div class="mid-afte-top-two">
         
         
          <?php
							$num_rec_per_page=1;
							if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
                            $start_from = ($page-1) * $num_rec_per_page;
										
			 
		   
		  $sql= "SELECT *,  ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($long) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM registration HAVING distance < 50 LIMIT $start_from, $num_rec_per_page";
		   
		   //$sql="SELECT * FROM  `registration`   LIMIT $start_from, $num_rec_per_page";
		
		
		
		 
			 $query=mysql_query($sql);
			 $result=mysql_num_rows($query);
			 
			 if($result!=0){ 
			 while($num=mysql_fetch_array($query)){
			  $reg_id=$num['reg_id']; 
	    ?>
        
        
       <a href="full_detail?Name=<?php echo urlencode($num['name']) ?>&id=<?php echo $reg_id ?>" target="_blank" > 
        <div class="main-right-container-box-section">
  
      <div class="inner-portion-cintainer">
	  
	     <div class="ew-img-icon">
		
         <img  height="100px" width="100px"  src="images/progress.jpg">
          
          
          
		 </div>
		 
		 <span class="prof-name-txt-one-box"><?php  echo $add=$num['name'];?></span>
         
		 
		
		 <div class="address-box-one">
		  <P><strong>Address :</strong><?php echo $add=$num['address']; ?>
          </p>
        
          
          <P><strong>Phone No :</strong><?php echo $contact_name=$num['mobile'];  ?>
          </p>
          <?php if($num['email']!="") ?>
          <P><strong>Email Address :</strong><?php echo $contact_name=$num['email'];  ?>
          </p>
          
		 
		 </div>
		 

      </div>
  
        
	
  </div>
  
  
  
  
              <div class="two-in-one-box-btn-container">
		 <div class="view-details-one-btn-box">
		 
		   <a href="full_detail?id=<?php echo $reg_id ?>" target="_blank" >  <input type="submit" value="View Details"></a>
		 </div>
		</div> 
        
        
        
        
        <?php 
		
		
         
		      $sqlp="SELECT *,  ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($long) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM registration HAVING distance < 50   ";
		$rs_result = mysql_query($sqlp); //run the query
      $total = mysql_num_rows($rs_result);
        
        
        ?>
      
        <?php  }?>
        
      <?php
	// Call the Pagination Function to load Pagination.

	echo displayPaginationBelow($setLimit,$page,$total);
	?>


        
        
        <?php }else{ ?>
        <img src="img/taptapdesign.jpg"  style="width:700px" height="500px" > 
        
        <!--                           <img src="img/download (1).jpg " style="width:500px" >
-->
        <?php }?>
        
      </div>
	  
	  <div class="right-banner-container-one">
					   <div class="banner-one-img">
					   
					       <img src="img/banner-img1.png" alt="banner-img1">
					   
					   </div>
					   
					    <div class="banner-one-img">
					   
					       <img src="img/banner-img2.png" alt="banner-img1">
					   
					   </div>
					
					
					
					</div>
        
	  
	  
	  
	  
	  
	                
	  
	  
	  
	  
	  
	  
	  
	  
	  
    </div>
  </div>
  
  <!--/span--> 
</div>


<div id="map" style="width:0px;height:0px; margin-top:100px; margin-left:600px "> </div>
<div id="map-canvas"> </div>
<footer>

<section class="footer-widget-area footer-widget-area-bg">

<div class="container">


<div class="row">

<div class="col-md-3 col-sm-4 col-xs-12">

    <div class="footer-widget">
        <div class="sidebar-widget-wrapper">
            <div class="footer-widget-header clearfix">
                <div class="join-heading text-heading-footer mb-10 ">Social Activity</div>

            </div>
            <div class="text-16 text-body-footer">
                Stay Connect With Us
            </div>


            <div class="social-icon-wrap">
                <div class="icon-child">

                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter-square"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus-square"></i></a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-youtube-square"></i></a>
                        </li>
                    </ul>


                </div>
            </div>
            <div class="footer-subscription">
                <div class="fb-page"
                     data-href="https://www.facebook.com/&#x92f;&#x94b;&#x917;-&#x938;&#x902;&#x926;&#x947;&#x936;-346815451996574/"
                     data-tabs="timeline" data-width="250" data-height="130" data-small-header="false"
                     data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false">
                    <blockquote
                            cite="https://www.facebook.com/&#x92f;&#x94b;&#x917;-&#x938;&#x902;&#x926;&#x947;&#x936;-346815451996574/"
                            class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/&#x92f;&#x94b;&#x917;-&#x938;&#x902;&#x926;&#x947;&#x936;-346815451996574/">योग
                        संदेश</a></blockquote>
                </div>

            </div>
        </div>
    </div>

</div>
<!--  end .col-md-4 col-sm-12 -->

<div class="col-md-3 col-sm-4 col-xs-12">

    <div class="footer-widget">

        <div class="sidebar-widget-wrapper">

            <div class="footer-widget-header clearfix">
                <div class="join-heading text-heading-footer mb-10 ">Contact Us</div>

            </div>


            <div class="textwidget">
                <div class="text-16 text-body-footer">
                    <!--#1-->
                    <i class="fa fa-envelope-o fa-contact"></i>

                    <div class="footer-links">
                        <a href="#">support@bloodngo.com</a><br><a href="#">helpme@bloodngo.com</a>
                    </div>
                    <!--#2-->
                    <i class="fa fa-location-arrow fa-contact"></i>

                    <div class="footer-links">
                        Road-2,3/A East Shibgonj,Sylhet-3100 <br>Bangladesh
                    </div>
                    <!--#3-->
                    <i class="fa fa-phone fa-contact"></i>

                    <div class="footer-links">
                        Office:&nbsp; (+880) 0823 560 433<br>Cell:&nbsp; (+880) 0723 161 343
                    </div>
                </div>


            </div>

        </div>
        <!-- end .footer-widget-wrapper  -->

    </div>
    <!--  end .footer-widget  -->

</div>
<!--  end .col-md-4 col-sm-12 -->

<div class="col-md-6 col-sm-4 col-xs-12">

    <div class="footer-widget clearfix">

        <div class="sidebar-widget-wrapper">

            <div class="footer-widget-header clearfix">
                <div class="join-heading text-heading-footer mb-10 ">Quick Links</div>

            </div>
            <ul class="footer-useful-links text-body-footer ">

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        About Us
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Why Give Blood
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        How Can Give Blood
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        The Donation Process
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Where to Donate
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        News adn Compaigns
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Register as Doner
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Request Blood
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Blood Tips
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Contact Us
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Male Doner
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Female doner
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Emergency
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        Campaign
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-caret-right fa-footer"></i>
                        News
                    </a>
                </li>
            </ul>

        </div>
        <!--  end .footer-widget  -->

    </div>
    <!--  end .footer-widget  -->

</div>
<!--  end .col-md-4 col-sm-12 -->

</div>
<!-- end row  -->

</div>
<!-- end .container  -->

</section>
<!--  end .footer-widget-area  -->

<!--FOOTER CONTENT  -->

<section class="footer-contents">

    <div class="container">

        <div class="row clearfix">

            <div class="col-md-6 col-sm-12">
                <div class="copyright-text text-body-footer clr-red"> Copyright © 2017, All Right Reserved - by
                    Bloodngo
                </div>

            </div>
            <!-- end .col-sm-6  -->

            <div class="col-md-6 col-sm-12 text-right">
                <div class="footer-nav">
                    <nav>
                        <ul class="text-body-footer clr-red">
                            <li>
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="#">Campaign</a>
                            </li>
                            <li>
                                <a href="#">Gallery</a>
                            </li>
                            <li>
                                <a href="#">News</a>
                            </li>
                            <li>
                                <a href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!--  end .footer-nav  -->
            </div>
            <!--  end .col-lg-6  -->

        </div>
        <!-- end .row  -->

    </div>
    <!--  end .container  -->

</section>
<!--  end .footer-content  -->

</footer>

</div>
<script>
            function abc(val){
			var add=document.getElementById('address').value;
			window.location.href = 'detail?cat=' + val + '&add=' + add ;	
			}
            
            
            </script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38304687-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




</body>
</html>
