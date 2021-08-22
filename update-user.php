

<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
$sql11=mysqli_query($con,"select * from `registration` where `admin_id`='$user_id' ");
  	$num2=mysqli_fetch_array($sql11);
if (isset($_POST['sub3'])) {

   $name = $_POST['name'];
    $email = $_POST['email'];
   
    $mobile = $_POST['mobile'];
    $address = urlencode($_POST['address']);
    $password = $_POST['password'];
    $zipcode = $_POST['zipcode'];
    $state =urlencode($_POST['state']);
	$city =urlencode($_POST['city']);
		
	 $update="update `registration` set `email`='$email',`name`='$name',`user_name`='$username',`password`='$password',`contact`='$mobile',`address`='$address',`state_id`='$state',`pincode`='$zipcode',`city_id`='$city' where `admin_id`='$user_id'";
	$resultup = mysqli_query($con,$update);
	
    echo "<script>alert('Update Successfuly')</script>";
   /* echo "<script> location.href='index.php' </script>";*/


    /*echo "<script> location.href=''</script>";*/
}


//on submit insert data


?>




<body>

<div id="preloader" style="display: none;">
    <span class="margin-bottom"><img
            src="images/loader.gif" alt=""></span>
</div>

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


<div class="join-heading text-heading mb-20 ">Profile Detail </div>

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
    <label class="control-label col-md-4 text-body-15  text-left">Name&nbsp;<strong
            class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control " placeholder="Enter Your Name"
               type="text" name="name" value="<?php echo $num2['name'] ?>" required>
    </div>
</div>
<!--User name-->
<div class="form-group">

    <label class="control-label col-lg-4 col-sm-5 text-left text-body-15">
        Email&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-lg-8 col-sm-7">
        <input class="form-control "
               placeholder="Please Choose a User Name" type="email"
               name="email" value="<?php echo $num2['email'] ?>"  required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">Mobile Number&nbsp;<strong
            class="clr-red">*</strong>
    </label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Enter Your Mobile Number"
               type="tel"
               pattern="[0-9]{10}" title="Phone Number?!?!"
               name="mobile" value="<?php echo $num2['contact'] ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">Address&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Enter Your address" type="text"
               name="address" value="<?php echo $num2['address'] ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">City&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="city" value="<?php echo $num2['city_id'] ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">ZIP/postal/postcode&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="zipcode"  value="<?php echo $num2['pincode'] ?>"required>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">State&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="state" value="<?php echo $num2['state_id'] ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">  Password&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please inter Password" type="password"
               name="password" value="<?php echo $num2['password'] ?>" required>
    </div>
</div>
<!--gender-->

<!--submit button-->
<div class="form-group  desktop-center mobile-center">
    <button class="mt-20 btn-red-submit " type="submit" name="sub3">
        Save
    </button>
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

<?php include "footer.php"; ?>
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