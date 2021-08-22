<!DOCTYPE html>
<html lang="en" class="ie8">
<html style="" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta charset="utf-8">
<title>Registration Form</title>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

<!-- The styles -->
<link rel="stylesheet" href="css/bootstrap.css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/venobox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>

<!--news ticker verticle-->
<script src="js/news_jsmart.js" type="text/javascript"></script>
<script src="js/newsticker.js" type="text/javascript"></script>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<?php
include "connection.php";
session_start();
$userid = $_SESSION['user_id'];
$siterid=$_GET['sitter'];
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

<header class="main-header clearfix" data-sticky_header="1">
  <div class="top-bar clearfix">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <ul class="list-inline">
            <!--<li >--> 
            <!--<i class="fa fa-phone"></i><a href="#">Quik Heal</a>--> 
            <!--</li>-->
            <li class="clr-gray-light-text"> <i class="fa fa-phone"></i>+ 215 1256 845 </li>
            <li class="clr-gray-light-text"> <i class="fa fa-phone"></i>info@blood.com </li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-12 text-center"> 
          <!--quick links start here-->
          <div class="">
            <ul class="list-inline">
              <!--<li >--> 
              <!--<i class="fa fa-phone"></i><a href="#">Quik Heal</a>--> 
              <!--</li>-->
              <li class="clr-gray-light-text"> <a href="#"><i class="fa fa-sign-in"></i>Login</a> </li>
              <li class="clr-gray-light-text"> <a href="#"><i class="fa fa-user"></i>Signup</a> </li>
            </ul>
          </div>
          <!--quick links end here--> 
        </div>
        <div class="col-md-2"> 
          <!--social icons start here-->
          <div class="top-bar-social"> <a href="#"><i class="fa fa-facebook-square fa-lg clr-facebook"></i></a> <a href="#"><i class="fa fa-twitter-square fa-lg clr-twitter"></i></a> <a href="#"><i class="fa fa-google-plus-square fa-lg clr-google-plus"></i></a> <a href="#"><i class="fa fa-youtube-square fa-lg clr-pintrest"></i></a> </div>
          <!--sociail icons ed here--> 
          
        </div>
      </div>
    </div>
    <!--  end .container --> 
    
  </div>
  <!--  end .top-bar  -->
  <div class="sticky-wrapper" style="height: 80px;">
    <section class="header-wrapper navgiation-wrapper stuck">
      <div class="navbar navbar-default heder-bottom-red">
        <div class="container header-line">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="logo" href="#"><img
                                alt=""
                                src="images/logo-2.png"></a> </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-right navbar-nav ">
              <li class="drop"> <a href="#"
                              
                            </li>
              <li><a href="#"
                                   title="About Us">About Us</a></li>
              <li> <a href="#">Contact</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>
</header>
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
                            <label class="control-label col-md-4 text-body-15  text-left">Date&nbsp;</label>
                            <div class="col-md-8">
                              <input class="form-control "  type="date" name="date" required>
                            </div>
                          </div>
                          <!--User name-->
                          <div class="form-group">
                            <label class="control-label col-lg-4 col-sm-5 text-left text-body-15"> Time&nbsp;<strong class="clr-red">*</strong></label>
                            <div class="col-lg-8 col-sm-7">
                              <input class="form-control " placeholder="" type="time"  name="time" required>
               
              
                            </div>
                          </div>
                          
                          <!--submit button-->
                          <div class="form-group  desktop-center mobile-center">
                            <button class="mt-20 btn-red-submit " type="submit" name="sub3"> Save </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!--tab data #3 start here--> 
                  
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