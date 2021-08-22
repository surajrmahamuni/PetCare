<?php 
session_start();
include "header.php";



if(isset($_POST['login']))

{

  $username=$_POST['username'];
	$password=$_POST['password'];
	
   if($username=="" || $password=="")
		   {
		  $msg= "<font color='red'><b>Please Enter Username or Password </b></font>";
		   }
 else{
	 
 $sql1=mysqli_query($con,"select * from  `registration` where `user_name`='$username' and `password`='$password' ");
$num=mysqli_fetch_array($sql1);
$result=mysqli_num_rows($sql1);
 $a= $num['admin_id'];;
$_SESSION['user_id']=$num['admin_id'];
$_SESSION['user_type']=$num['type'];
$_SESSION['name']=$num['name'];
echo $page=$_SESSION['page'];

if($result>0){
	if($page==""){
echo "<script>location.href='index.php'</script>";
	}else{
		
	echo "<script>location.href='".$page."'</script>";	
		
	}
}
}
}

?>

<body>



<!--  HEADER -->

s
<!-- end main-header  -->


<!--login and regiter strt here-->
<section class="section-appointment">
    <div class="container wow fadeInUp" style="visibility: hidden; animation-name: none;">

        <div class="row">
            <!--about-->
            <div class="col-md-10 col-md-offset-1  mt-30">

                <div class=" clearfix mb-30 ">
                    <!--<h4 class="join-heading padding-left-30">Make Donor</h4>-->
                    <div class="text-right">
                        <p class="page-breadcrumb">
                            <a href="#">Home</a> / Login Form
                        </p>
                    </div>

                    <div class="join-heading text-heading mb-20 "> login Form</div>

                    <div class="tab" role="tabpanel">
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <!-- Tab panes -->
                                <div class="tab-content tabs">

                                    <!--tab data #1 start here-->
                                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                                        <div class="">
                                            <div class="clearfix mb-30 -bg padding-between ">
                                                <div class="ticker col-md-8 col-md-offset-2 ">
                                                    <form class="appoinment-form" method="post">

                                                        <!--User name-->
                                                        <div class="form-group">

                                                            <label
                                                                class="control-label col-lg-4 col-sm-5 col-xs-12 text-left text-body-15">User
                                                                Name /
                                                                Email&nbsp;<strong class="clr-red">*</strong></label>

                                                            <div class="col-lg-8 col-sm-7 col-xs-12">
                                                                <input class="form-control "
                                                                       placeholder="Please Choose a User Name"
                                                                       type="text" value=""
                                                                       name="username" required>
                                                            </div>
                                                        </div>
                                                        <!--password-->


                                                        <div class="form-group">
                                                            <label
                                                                class="control-label col-lg-4 col-sm-5 col-xs-12 text-left text-body-15">Password&nbsp;<strong
                                                                    class="clr-red">*</strong></label>

                                                            <div class="col-lg-8  col-sm-7 col-xs-12">
                                                                <input class="form-control "
                                                                       placeholder="Please inter Password"
                                                                       type="password"
                                                                       value=""
                                                                       name="password" required>
                                                            </div>
                                                        </div>


                                                        <!--submit button-->
                                                        <div class="form-group mobile-center ">
                                                            <label
                                                                class="control-label col-lg-4 col-sm-5 col-xs-12 text-left text-body-15">
                                                                &nbsp;<strong class="clr-red"></strong></label>

                                                            <div class="col-lg-8  col-sm-7 col-xs-12">
                                                            <input type="submit" name="login" value="login">
                                                            
                                                               
                                                            </div>
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