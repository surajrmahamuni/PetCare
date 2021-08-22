<?php
error_reporting(0);
include "header.php";
include "connection.php";
 $todaydate=date('Y-m-d');

if(isset($_POST['search']))
{

    $service_type2 =$_POST['service_type'];
  if($service_type2!=""){
    if($search)
     $search.=" and ";
  $search.="t2.service_id=$service_type2";  
   }
  
  
  
   $pettypedog =$_POST['pettypedog'];
   
   if($pettypedog!=""){
     if($search)
     $search.=" and ";
  $search.="t1.pet_dog='$pettypedog'";  
   }
   
   $pettypecat =$_POST['pettypecat'];
    if($pettypecat!=""){
    if($search)
    $search.=" and ";
  $search.=" t1.pet_cat='$pettypecat'";  
   }
    $zipcode =$_POST['zipcode'];
    if($zipcode!=""){
    if($search)
    $search.=" and ";
  $search.="(t1.address like '%$zipcode%' or t1.zipcode like '%$zipcode%')";  
   }
   
   
   
   $date1=$_POST['date1'];
   $date2=$_POST['date2'];
    if($date1!="" & $date2==""){
    if($search)
    $search.=" and ";
   $search.="  t1.reg_id in (select `sitter_id` from `calander` where `date`>='$date1' and `status`='0' and `date`>='$todaydate' ) ";
   
   $search1=" and date>='$date1'";
   
  }
  if($date1=="" & $date2!=""){
    if($search)
    $search.=" and ";
   $search.="  t1.reg_id in (select `sitter_id` from `calander` where `date`<='$date2' and `status`='0' and `date`>='$todaydate') ";
   $search1=" and `date`<='$date2'";
  }
  if($date1!="" & $date2!=""){
    if($search)
    $search.=" and ";
   $search.="  t1.reg_id in (select `sitter_id` from `calander` where `date`>='$date1' and `date`<='$date2' and `status`='0' and `date`>='$todaydate') ";
   $search1=" and `date`>='$date1' and `date`<='$date2'";
  }
  
  
  
  
  
  
   $dog_size0_15 =$_POST['dog_size0_15'];
    if($dog_size0_15!=""){
    if($search)
    $search.=" and ";
  $search.="t1.dog_size0_15='$dog_size0_15'";  
   }
   $dog_size16_40 =$_POST['dog_size16_40'];
    if($dog_size16_40!=""){
    if($search)
    $search.=" and ";
  $search.=" t1.dog_size16_40='$dog_size16_40'";  
   }
   $dog_size41_100 =$_POST['dog_size41_100'];
    if($dog_size41_100!=""){
    if($search)
    $search.=" and ";
  $search.=" t1.dog_size41_100='$dog_size41_100'";  
   }
   
   $total_pet=$_POST['total_pet'];
    if($total_pet!=""){
    if($search)
     $search.=" and ";
  $search.=" t1.total_pet>='$total_pet'";  
   }
   
   $has_house=$_POST['has_house'];
    if($has_house!=""){
    if($search)
     $search.=" and ";
  $search.=" t1.has_house='$has_house'";  
   }
   
   $has_fanced_yard=$_POST['has_fanced_yard'];
    if($has_fanced_yard!=""){
    if($search)
     $search.=" and ";
  $search.=" t1.has_fanced_yard='$has_fanced_yard'";  
   }
   
   $not_own_dog=$_POST['not_own_dog'];
    if($not_own_dog!=""){
    if($search)
     $search.=" and ";
  $search.=" t1.not_own_dog='$not_own_dog'";  
   }
   
   $not_own_cat=$_POST['not_own_cat'];
    if($not_own_cat!=""){
    if($search)
    $search.=" and ";
  $search.="t1.not_own_cat='$not_own_cat'";  
   }
  



} 
if($search){$search=" where  ".$search ; }
//echo $service_type2='1';
if($service_type2==''){
 //$service_type2='1';  
  
}
?>

<div class="container-1">
  <div class="app_page1">
    <div class="row">
      <div class="col-sm-3" id="left">
        <form method="post">
          <div class="input-box">
            <div class="col-md-12">Boarding</div>
            <select name="service_type" class="form-control">
              <option value="">All</option>
              <?php 
                                            $sql=mysqli_query($con,"select * from `services` ");
                      while($num=mysqli_fetch_array($sql)){
                        
                        
                                            ?>
              <option value="<?php echo $num['service_id']; ?>" <?php if($num['service_id']==$service_type2){  echo 'Selected'; } ?>> <?php echo $num['service_name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="input-box">
            <div class="col-md-12">Boarding Near</div>
            <input type="text" name="zipcode" value="<?php echo $zipcode ?>" class="form-control" placeholder="zip or Address" />
          </div>
          <div class="input-box">
            <div class="col-md-12"> Date </div>
            
              <input type="date" name="date1" value="<?php echo $date1 ?>" class="form-control" />
          
            
              <input type="date" name="date2" value="<?php echo $date2 ?>" class="form-control" />
                      </div>
          <div class="input-box">
            <div class="col-md-12">Pet Type</div>
            <input type="checkbox" name="pettypedog" value="yes" <?php if($pettypedog=='yes'){  echo 'checked="checked"'; } ?>  />
            Dog
            <input type="checkbox" name="pettypecat" value="yes"  <?php if($pettypecat=='yes'){  echo 'checked="checked"'; } ?> />
            Cat </div>
          <div class="input-box">
            <div class="col-md-12">Dog Size</div>
            <input type="checkbox" id='c1' name="dog_size0_15" <?php if($dog_size0_15=='yes'){  echo 'checked="checked"'; } ?>  value="yes" class='chk-btn' />
            <label for='c1'>0-15 Pounds</label>
            <input type="checkbox" id='c2' name="dog_size16_40" value="yes" <?php if($dog_size16_40=='yes'){  echo 'checked="checked"'; } ?> class='chk-btn' />
            <label for='c2'>16-40 Pounds</label>
            <input type="checkbox" id='c3' name="dog_size41_100" value="yes" <?php if($dog_size41_100=='yes'){  echo 'checked="checked"'; } ?> class='chk-btn' />
            <label for='c3'>41-100 Pounds</label>
          </div>
          <div class="input-box">
            <div class="col-md-12">How Many Pets?</div>
            <input type="radio" id='c11' name="total_pet" <?php if($total_pet=='1'){  echo 'checked="checked"'; } ?>  value="1" class='chk-btn1' />
            <label for='c11'>1</label>
            <input type="radio" id='c21' name="total_pet" value="2" <?php if($total_pet=='2'){  echo 'checked="checked"'; } ?> class='chk-btn1' />
            <label for='c21'>2</label>
            <input type="radio" id='c31' name="total_pet" value="3" <?php if($total_pet=='3'){  echo 'checked="checked"'; } ?> class='chk-btn1' />
            <label for='c31'>3+</label>
          </div>
          <div class="input-box">
            <div class="col-md-12"><span class="heading">Housing conditions</span></div>
            <div class="flter">
              <input type="checkbox"  name="has_house" <?php if($has_house=='yes'){  echo 'checked="checked"'; } ?>  value="yes"  />
              House with fence </div>
            <div class="flter">
              <input type="checkbox"  name="has_fanced_yard" <?php if($has_fanced_yard=='yes'){  echo 'checked="checked"'; } ?>  value="yes"  />
              Apartment </div>
          </div>
          <div class="sub-btn">
            <input type="submit" name="search" value="Search" />
          </div>
        </form>
      </div>
      <?php  
    
    $jsonData = array();
    
    if($service_type2!=""){ 
    
    $sqlm=mysqli_query($con,"select * from add_sitter as t1 left join user_service as t2 on t1.reg_id=t2.user_id   $search group by t2.user_id"); 
    }else{
      
    $sqlm=mysqli_query($con,"select * from add_sitter as t1    $search ");  
    }
    
    
    //$sqlm=mysqli_query($con,"select * from add_sitter as t1 left join user_service as t2 on t1.reg_id=t2.user_id  $search group by t2.user_id"); 
     $countmap=mysqli_num_rows($sqlm);
    if($countmap=="0"){
    $zipcode1 = urlencode($zipcode);
  
  $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=AIzaSyCQnyh9PnA9MQ0805oNA0F0w6UQvU22dKc&address=' . $zipcode1 . ',+' . $zipcode1 . '&sensor=true');
    $output = json_decode($geocode); //Store values in variable
     $lat = $output->results[0]->geometry->location->lat; //Returns Latitude
    echo "<br/>";
     $long = $output->results[0]->geometry->location->lng; // Returns Longitude 
   
         $jsonTempData = array();     
      
            $jsonTempData['title'] =  $zipcode;
      $jsonTempData['lat'] =  $lat;
      $jsonTempData['lng'] = $long;
      $jsonTempData['icon'] =  'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png';      
      $jsonTempData['description'] =  'Petcare';
      $jsonData[] = $jsonTempData;
      
    }else{
    
    
    while($row2=mysqli_fetch_array($sqlm)){
      
      $jsonTempData = array();      
      
            $jsonTempData['title'] =  $row2['name'];
      $jsonTempData['lat'] =  $row2['latitude'];
      $jsonTempData['lng'] =  $row2['longitude'];
      $jsonTempData['icon'] =  'http://maps.gstatic.com/mapfiles/ridefinder-images/mm_20_green.png';      
      $jsonTempData['description'] =  'Petfinder';
      $jsonData[] = $jsonTempData;
      
    }
    }
  $abc=json_encode($jsonData);
    
    ?>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQnyh9PnA9MQ0805oNA0F0w6UQvU22dKc"></script> 
      <script type="text/javascript">
var markers = <?php echo $abc;



?>
</script> 
      <script type="text/javascript">
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 11,
            flat: true,
            styles: [ { "stylers": [ { "hue": "#4bd6bf" }, { "gamma": "1.58" } ] } ],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var infoWindow = new google.maps.InfoWindow();
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
        icon: markers[i][3],
                title: data.title
            });
            
            
            
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        
    }
    
    
    
</script>
      <div class="col-sm-5"  id="middle">
        <?php 
    if($service_type2!=""){ 
    
    $sql=mysqli_query($con,"select * from add_sitter as t1 left join user_service as t2 on t1.reg_id=t2.user_id   $search group by t2.user_id"); 
    }else{
    
    $sql=mysqli_query($con,"select * from add_sitter as t1    $search "); 
    }
    $countvalue=mysqli_num_rows($sql);
    if($countvalue==0){?>
        <div class="msg">No One Available In Your Area</div>
        <?php }else{
    
    while($num1=mysqli_fetch_array($sql)){
      
    $pid=$num1['reg_id']; 
    
    ?>
        <div class="sitter-detail">
          <div class="col-md-3">
            <div class="sitter-img">
              <?php  if($num1['img']!=""){ ?>
              <img src="admin/userimg/<?php echo $num1['img']; ?>">
              <?php }else{ ?>
              <img src="images/download.png">
              <?php } ?>
              <br />
              <?php $price=mysqli_fetch_array(mysqli_query($con,"select min(`price`) from user_service  where user_id=$pid"));
                                
                                ?>
              <span class="price"> From <br />
              <?php if($price[0]==""){echo '0.00'; }else{ echo $price[0]; } ?>
              / Hour </span> </div>
          </div>
          <div class="col-md-9">
            <div class="sitter-name"> <?php echo $num1['name']; ?> </div>
            <div class="sitter-address">
              <?php //echo $num1['address']; ?>
              <?php //if($num1['city']!=""){ echo ' , ';  echo $num1['city']; }?>
              <?php //if($num1['zipcode']!=""){ echo ' , ';  echo $num1['zipcode']; }?>
              <?php echo $num1['city']; ?> </div>
            <div class="availble">
              <div class="col-md-12 "> <span style="text-align:left;color:#1a8557"><b> Availble Time</b></span> </div>
              <?php 
	  if($search1==""){
		  
		$search1=" and date='$todaydate' ";  
	  }
		  
		  
	  
   $sqld=mysqli_query($con,"select * from  calander  where `sitter_id`='$pid' and `status`='0' and date>='$todaydate' $search1    group by date"); 
		
		while($numd=mysqli_fetch_array($sqld)){ 
		$datee=$numd['date'];?>
              <div class="col-md-12 date">
                <div class="col-md-4 date"> <?php echo date('M d,Y',strtotime($datee)) ?> </div>
                <?php 
  
    $sqlt=mysqli_query($con,"select * from  calander  where `sitter_id`='$pid' and `date`='$datee' and `status`='0'"); 
    
    while($numt=mysqli_fetch_array($sqlt)){ 
    
    $timeid=$numt['calander_id'];
    
    ?>
                <div class="col-md-3 time"> <b><?php echo date('h:i a',strtotime($numt['time'])) ?></b> </div>
                <?php } ?>
              </div>
              <?php }?>
            </div>
            <div class="sitter-info"> <?php echo  substr($num1['about'], 0, 100). '...'; ?> </div>
            <div class="more-btn"> <a href="sitter-profile.php?id=<?php echo $num1['reg_id']; ?>" class="readmore">Read More</a> &nbsp;
              <?php 
  
  
  //if($user_type=='user'){ ?>
              <a href="sitter-profile.php?id=<?php echo $num1['reg_id']; ?>" class="readmore">Book Now</a>
              <?php   //} ?>
            </div>
          </div>
        </div>
        <?php } } ?>
      </div>
      <div class="col-sm-4" id="right">
        <div id="dvMap" style="width: 100%; height: 100%"> </div>
        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27774.13545584049!2d75.27798340000001!3d29.523151999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391143480177ec0f%3A0x384570a6f7f2d5ab!2zMjnCsDMxJzM2LjciTiA3NcKwMTYnMTUuOCJF!5e0!3m2!1sen!2sin!4v1613381947528!5m2!1sen!2sin" width="100%" height="590" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>--> 
        
      </div>
    </div>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
<?php include "footer.php"; ?>
