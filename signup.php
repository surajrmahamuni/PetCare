


<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
if (isset($_POST['sub3'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $type = $_POST['type'];
    $mobile = $_POST['mobile'];
    $address = urlencode($_POST['address']);
    $password = $_POST['password'];
    $zipcode = $_POST['zipcode'];
    $state =urlencode($_POST['state']);

    $city = urlencode($_POST['city']);
    
     $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyCQnyh9PnA9MQ0805oNA0F0w6UQvU22dKc&address=' . $address . ',+' . $city . ',+' . $state . '&sensor=true');
    $output = json_decode($geocode); //Store values in variable
     $lat = $output->results[0]->geometry->location->lat; //Returns Latitude
    echo "<br/>";
     $long = $output->results[0]->geometry->location->lng; // Returns Longitude
   


$s1="insert into `registration`(`type`,`name`,`user_name`,`password`,`address`,`contact`,`email`,`entry_date`,`status`,`state_id`,`city_id`,`pincode`,`latitude`,`longitude`)VALUES('$type','$name','$email','$password','$address','$mobile','$email',now(),'$status','$state','$city','$zipcode','$lat','$long')";
   $q1=mysqli_query($con,$s1);
        $regid=mysqli_insert_id($con);
    
    if($type=='sitter'){
    $s1="INSERT INTO `add_sitter` (

`name` ,
`address` ,
`mobile` ,
`email` ,
`date` ,
`reg_id`,`latitude`,`longitude`,`zipcode` 
)
VALUES (
 '$name', '$address', '$mobile', '$email',  now(),'$regid','$lat','$long','$zipcode'
);";
        
        $q1=mysqli_query($con,$s1);
    }
    
    $_SESSION['user_id'] = $regid;
    $_SESSION['name'] = $name;
    echo "<script>alert('Registration Successfuly')</script>";
    echo "<script> location.href='login.php' </script>";


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


<div class="join-heading text-heading mb-20 ">Sign up on Petcare</div>

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

<div class="form-group">
    <label class="control-label col-md-4 text-body-15  text-left">Signup as&nbsp;<strong
            class="clr-red">*</strong></label>

    <div class="col-md-8">
        <select name="type" class="form-control " >
        <option value="sitter">Become a Sitter</option>
        <option value="user">Become a User</option>
        </select>
    </div>
</div>


<!--name-->
<div class="form-group">
    <label class="control-label col-md-4 text-body-15  text-left">Name&nbsp;<strong
            class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control " placeholder="Enter Your Name"
               type="text" name="name" required>
    </div>
</div>
<!--User name-->
<div class="form-group">

    <label class="control-label col-lg-4 col-sm-5 text-left text-body-15">
        Email&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-lg-8 col-sm-7">
        <input class="form-control "
               placeholder="Please Choose a User Name" type="email"
               name="email" required>
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
               name="mobile" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">Address&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Enter Your address" type="text"
               name="address" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">City&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="city" required>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">ZIP/postal/postcode&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="zipcode" required>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15">State&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please Choose Your City" type="text"
               name="state" required>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-4 text-left text-body-15"> Create Password&nbsp;<strong class="clr-red">*</strong></label>

    <div class="col-md-8">
        <input class="form-control "
               placeholder="Please inter Password" type="password"
               name="password" required>
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


<!-- START FOOTER  -->
<?php include "footer.php"; ?>
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

<style>
    
    .join-heading.text-heading.mb-20 {
    text-align: center;
    color: #1a8557;
    font-weight: bold;
}
button.mt-20.btn-red-submit {
    width: 50%;
   
}
.form-group.desktop-center.mobile-center {
    text-align: center;
}
    
</style>