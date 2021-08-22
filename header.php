<?php
session_start();
 $user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];

$userdetail=mysqli_fetch_array(mysqli_query($con,"select * from `registration`  where admin_id=$user_id")); 

include "connection.php";

function sittername($val,$con){
        if($val!=""){
           
            $q21=mysqli_fetch_array(mysqli_query($con,"SELECT `name` FROM  `registration` where `admin_id`=$val"));
             
         return trim($q21[0]);
         }
}

 ?>

<!DOCTYPE html>
<html lang="en" class="ie8">
<html style="" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <title>Pet Care</title>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <!-- The styles -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/venobox.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/index.css">
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

<style>
.navbar-default .navbar-nav>li>a, .navbar-default .navbar-text {
    color: #2a6ca3;
    font-weight: bold;
    font-size: 16px;
}
.provider-services .col-md-4 {
    border-right: 1px solid #ccc;
    font-size: 14px !important;
}

.col-md-4.text-center.js-shared-gallery-trigger.js-provider-picture-wrap img {
    width: 50%;
}
a.logo {
    width: 43% !important;
}
</style>

<div id="preloader" style="display: none;">
    <span class="margin-bottom"><img
            src="images/loader.gif" alt=""></span>
</div>


<header class="main-header clearfix" data-sticky_header="1">

    <div class="top-bar clearfix">

        <div class="container">

            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <ul class="list-inline">
                        <!--<li >-->
                        <!--<i class="fa fa-phone"></i><a href="#">Quik Heal</a>-->
                        <!--</li>-->
                        <li class="clr-gray-light-text">
                            <i class="fa fa-phone"></i>+ 215 1256 845
                        </li>
                        <li class="clr-gray-light-text">
                            <i class="fa fa-phone"></i>info@petfinder.com
                        </li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-12 text-center">
                    <!--quick links start here-->
                    <div class="">
                        <ul class="list-inline">
                            <!--<li >-->
                            <!--<i class="fa fa-phone"></i><a href="#">Quik Heal</a>-->
                            <!--</li>-->
                            <?php if($user_id==""){ ?>
                            
                            <li class="clr-gray-light-text">
                                <a href="login.php"><i class="fa fa-sign-in"></i>Login</a>

                            </li>
                            <li class="clr-gray-light-text">
                                <a href="signup.php"><i class="fa fa-user"></i>Signup</a>

                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!--quick links end here-->
                </div>

                <div class="col-md-2">
                    <!--social icons start here-->
                    <div class="top-bar-social">
                        <a href="#"><i class="fa fa-facebook-square fa-lg clr-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter-square fa-lg clr-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus-square fa-lg clr-google-plus"></i></a>
                        <a href="#"><i class="fa fa-youtube-square fa-lg clr-pintrest"></i></a>
                    </div>
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
                                data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="index.php"><img
                                alt=""
                                src="images/logo.png"></a>
                    </div>

                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-right navbar-nav ">
                            <li class="drop">
                                <a href="index.php"
                                   title="Home Layout 01">Home</a>
                                <!--<ul class="drop-down">-->
                                <!--<li><a href="index-boxede.html"-->
                                <!--title="Home Layout 01">Home Layout 1</a></li>-->
                                <!--<li><a href="home-2.html"-->
                                <!--title="Home Layout 02">Home Layout 2</a></li>-->
                                <!--</ul>-->
                            </li>
                            <li><a href="About-Us.php"
                                   title="About Us">About Us</a></li>

 <li>
                                <a href="contactus.php">Contact</a>
                            </li>
                           

                           <?php if($user_type=="sitter"){?>
                            <li class="drop"><a href="#">Profile</a>
                                <ul class="drop-down">
                                    <li><a href="sitter-profile.php?id=<?php echo $user_id ?>">Profile</a></li>
                                    <li><a href="booking_detail.php">Booking Detail</a></li>
                                    <li class="drop"><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                            <?php if($user_type=="user"){?>
                            <li class="drop"><a href="#">Profile</a>
                                <ul class="drop-down">
                                    <li><a href="update-user.php">Profile</a></li>
                                     <li><a href="user-booking.php">Booking Detail</a></li>
                                   
                                    <li class="drop"><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                            <?php } ?>

                           
                        </ul>
                    </div>
                </div>
            </div>

        </section>
    </div>


</header>
<style>

</style>