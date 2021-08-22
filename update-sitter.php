<?php
include "header.php";
session_start();
$userid = $_SESSION['user_id'];
$sql11=mysqli_query($con,"select * from `add_sitter` where `reg_id`='$user_id' ");
  	$num2=mysqli_fetch_array($sql11);
if (isset($_POST['sub3'])) {
   $name = $_POST['name']; $address = urlencode($_POST['address']); $mobile = $_POST['mobile']; $email = $_POST['email']; $about = $_POST['about']; $pet_dog = $_POST['pet_dog']; $pet_cat = $_POST['pet_cat']; $dog_size0_15 = $_POST['dog_size0_15']; $dog_size16_40 = $_POST['dog_size16_40']; $dog_size41_100 = $_POST['dog_size41_100']; $dog_size101 = $_POST['dog_size101']; $total_pet = $_POST['total_pet']; $has_house = $_POST['has_house']; $has_fanced_yard = $_POST['has_fanced_yard']; $dogs_allowed_on_furniture = $_POST['dogs_allowed_on_furniture']; $dogs_allowed_on_bed = $_POST['dogs_allowed_on_bed']; $non_smoking_home = $_POST['non_smoking_home']; $not_own_dog = $_POST['not_own_dog']; $not_own_cat = $_POST['not_own_cat']; $accept_client = $_POST['accept_client']; $not_caused_pet = $_POST['not_caused_pet']; $has_no_child = $_POST['has_no_child']; $no_child_0_5 = $_POST['no_child_0_5']; $no_child_6_12 = $_POST['no_child_6_12']; $price = $_POST['price']; $watch_dog_size0_15 = $_POST['watch_dog_size0_15']; $watch_dog_size16_40 = $_POST['watch_dog_size16_40']; $watch_dog_size41_100 = $_POST['watch_dog_size41_100']; $watch_dog_size101 = $_POST['watch_dog_size101'];
   $img1 = $_POST['img1'];
   $img=$_FILES["img"]["name"];
   if($img==""){
   
   $img=$img1;
   }else{
	   
	move_uploaded_file($_FILES["img"]["tmp_name"],"admin/userimg/".$_FILES["img"]["name"]); 
   }
		 $zipcode = urlencode($_POST['zipcode']);
		  $city = urlencode($_POST['city']);
		    $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyCQnyh9PnA9MQ0805oNA0F0w6UQvU22dKc&address=' . $address . ',+' . $city . ',+' . $zipcode . '&sensor=true');
    $output = json_decode($geocode); //Store values in variable
     $lat = $output->results[0]->geometry->location->lat; //Returns Latitude
    echo "<br/>";
     $long = $output->results[0]->geometry->location->lng; // Returns Longitude
	   $update="UPDATE `add_sitter` SET `total_pet` = '$total_pet',`name` = '$name ', `address` = '$address', `mobile` = '$mobile', `email` = '$email', `about` = '$about', `pet_dog` = '$pet_dog', `pet_cat` = '$pet_cat', `dog_size0_15` = '$dog_size0_15', `dog_size16_40` = '$dog_size16_40', `dog_size41_100` = '$dog_size41_100', `dog_size101` = '$dog_size101', `has_house` = '$has_house', `has_fanced_yard` = '$has_fanced_yard', `dogs_allowed_on_furniture` = '$dogs_allowed_on_furniture', `dogs_allowed_on_bed` = '$dogs_allowed_on_bed', `non_smoking_home` = '$non_smoking_home', `not_own_dog` = '$not_own_dog', `not_own_cat` = '$not_own_cat', `accept_client` = '$accept_client', `not_caused_pet` = '$not_caused_pet', `has_no_child` = '$has_no_child', `no_child_0_5` = '$no_child_0_5', `no_child_6_12` = '$no_child_6_12' ,`img`='$img',`zipcode`='$zipcode',`city`='$city', `watch_dog_size0_15` = '$watch_dog_size0_15', `watch_dog_size16_40` = '$watch_dog_size16_40', `watch_dog_size41_100` = '$watch_dog_size41_100', `watch_dog_size101` = '$watch_dog_size101', `latitude` = '$lat', `longitude` = '$long' where `reg_id`='$user_id'";
	$resultup = mysqli_query($con,$update);
	$update=mysqli_query($con,"UPDATE `registration` SET `address` = '$address',`name` = '$name',`contact` = '$mobile',`email` = '$email',`latitude` = '$lat', `longitude` = '$long' where `admin_id`='$user_id'");
    echo "<script>alert('update Successfuly')</script>";
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
        
        <div class="join-heading text-heading mb-20 ">Update Your Profile</div>
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
                        <form class="appoinment-form" method="post" enctype="multipart/form-data">
                          
                          <!--name-->
                          <div class="form-group">
                            <div class="col-md-12">
                              <div class="col-md-4"> Upload Profile Photo * </div>
                              <div class="col-md-8">
                                <input type="file" name="img" value="<?php echo $num2['img']; ?>"  />
                                <input type="hidden" name="img1" value="<?php echo $num2['img']; ?>">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4"> Pet Type </div>
                              <div class="col-md-8">
                                <input type="checkbox" name="pet_dog" <?php if($num2['pet_dog']=='yes'){ echo "checked";  } ?>  value="yes" />
                                Dog
                                <input type="checkbox" name="pet_cat" <?php if($num2['pet_cat']=='yes'){ echo "checked";  } ?> value="yes" />
                                Cat </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4"> Host Dog Size</div>
                              <div class="col-md-8">
                                <input type="checkbox" name="dog_size0_15" <?php if($num2['dog_size0_15']=='yes'){ echo "checked";  } ?> value="yes" />
                                0-15
                                <input type="checkbox" name="dog_size16_40" <?php if($num2['dog_size16_40']=='yes'){ echo "checked";  } ?> value="yes" />
                                16-40
                                <input type="checkbox" name="dog_size41_100" <?php if($num2['dog_size41_100']=='yes'){ echo "checked";  } ?> value="yes" />
                                41-100
                                <input type="checkbox" name="dog_size101" <?php if($num2['dog_size101']=='yes'){ echo "checked";  } ?> value="yes" />
                                100+ </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4"> Watch at home Dog Size</div>
                              <div class="col-md-8">
                                <input type="checkbox" name="watch_dog_size0_15" <?php if($num2['watch_dog_size0_15']=='yes'){ echo "checked";  } ?> value="yes" />
                                0-15
                                <input type="checkbox" name="watch_dog_size16_40" <?php if($num2['watch_dog_size16_40']=='yes'){ echo "checked";  } ?> value="yes" />
                                16-40
                                <input type="checkbox" name="watch_dog_size41_100" <?php if($num2['watch_dog_size41_100']=='yes'){ echo "checked";  } ?> value="yes" />
                                41-100
                                <input type="checkbox" name="watch_dog_size101" <?php if($num2['watch_dog_size101']=='yes'){ echo "checked";  } ?> value="yes" />
                                100+ </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4"> How Many Pets</div>
                              <div class="col-md-8">
                                <input type="radio" name="total_pet" <?php if($num2['total_pet']=='0'){ echo "checked";  } ?> value="0" />
                                No
                                <input type="radio" name="total_pet" <?php if($num2['total_pet']=='1'){ echo "checked";  } ?> value="1" />
                                1
                                <input type="radio" name="total_pet" <?php if($num2['total_pet']=='2'){ echo "checked";  } ?> value="2" />
                                2
                                <input type="radio" name="total_pet" <?php if($num2['total_pet']=='3+'){ echo "checked";  } ?> value="3+" />
                                3+ </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">House Conditions</div>
                              <div class="col-md-8">
                                <div class="col-lg-12">
                                  <input type="checkbox" name="has_house" <?php if($num2['has_house']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Has House </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="has_fanced_yard" <?php if($num2['has_fanced_yard']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Has fanced yard </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="dogs_allowed_on_furniture" <?php if($num2['dogs_allowed_on_furniture']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Dogs allowed on furniture </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="dogs_allowed_on_bed" <?php if($num2['dogs_allowed_on_bed']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Dogs allowed on bed </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="non_smoking_home" <?php if($num2['non_smoking_home']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Non-smoking home </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Pets In Home</div>
                              <div class="col-md-8">
                                <div class="col-lg-12">
                                  <input type="checkbox" name="not_own_dog" <?php if($num2['not_own_dog']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Doesn't own a dog </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="not_own_cat" <?php if($num2['not_own_cat']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Doesn't own a cat </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="accept_client" <?php if($num2['accept_client']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Accept only one client at a time </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="not_caused_pet" <?php if($num2['not_caused_pet']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Does not own caged pets </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Children in Home</div>
                              <div class="col-md-8">
                                <div class="col-lg-12">
                                  <input type="checkbox" name="has_no_child" <?php if($num2['has_no_child']=='yes'){ echo "checked";  } ?> value="yes" />
                                  Has no children </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="no_child_0_5" <?php if($num2['no_child_0_5']=='yes'){ echo "checked";  } ?> value="yes" />
                                  No children 0-5 year old </div>
                                <div class="col-lg-12">
                                  <input type="checkbox" name="no_child_6_12" <?php if($num2['no_child_6_12']=='yes'){ echo "checked";  } ?> value="yes" />
                                  No children 6-12 year old </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Name</div>
                              <div class="col-md-8">
                                <input type="text" name="name" value="<?php echo $num2['name']; ?>" required />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">address</div>
                              <div class="col-md-8">
                                <textarea class="form-control" name="address"  value="" required ><?php echo $num2['address']; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">City</div>
                              <div class="col-md-8">
                                <input type="text" name="city" value="<?php echo $num2['city']; ?>" required />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Zipcode</div>
                              <div class="col-md-8">
                                <input type="text" name="zipcode" value="<?php echo $num2['zipcode']; ?>" required />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Mobile</div>
                              <div class="col-md-8">
                                <input type="text" name="mobile" value="<?php echo $num2['mobile']; ?>" required />
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">Email</div>
                              <div class="col-md-8">
                                <input type="email" name="email"  value="<?php echo $num2['email']; ?>"/>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="col-md-4">About</div>
                              <div class="col-md-8">
                                <textarea id="content"  name="about"  placeholder="Enter Project Comment" rows="6" ><?php echo $num2['about']; ?></textarea>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <button class="mt-20 btn-red-submit " type="submit" name="sub3"> Save </button>
                            </div>
                          </div>
                          <div class="form-group  desktop-center mobile-center"> </div>
                        </form>
                      </div>
                    </div>
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