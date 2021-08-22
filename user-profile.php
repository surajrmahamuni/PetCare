<?php 
include "header.php";

?>
<main role="main" id="base-content" class="rover-main-content-wrap js-rover-main-content-wrap content "  data-qa-id="base-content">
            
    
    


            <div class="container">
                

            </div>

            
<div id="react-survey-modal-app"></div>




<div class="container-fluid bg-dark padding-top-x4">
    <div class="container margin-bottom-x4">
    

    
        
            
                

<div class="row">
    <div class="col-md-12">
        <div class="rover-alert-warn alert">
            
            Please <a href="profile.php">complete your sitter profile</a>.
        </div>
    </div>
</div>

            

            
        
    

    




    <div class="row">
        <div class="col-md-3">
            <div class="rover-widget-block" data-qa-id="account-widgets-account-info">
                <div class="rover-widget-block-inner-wide">
                    <h5 class="rover-widget-title bordered-bottom" data-qa-id="account-widgets-account-info-title">
                        <i class="rover-icon rover-icon-account-info"></i>
                        Account Info
                    </h5>
                    <div class="rover-widget-body">
                        <div class="col-xs-6 margin-bottom-x2">
                            <img
                                
                                    src="admin/userimg/<?php echo $user_result['img']; ?>"
                                
                                class="img-responsive img-rounded"
                                alt="<?php echo $user_result['name']; ?>."
                            >
                        </div>
                        <div class="col-xs-6">
                            <ul class="list-unstyled section-links">
                                <li>
                                    <strong class="text-small"><?php echo $user_result['name']; ?></strong>
                                </li>
                                
                                <li>
                                    <a href="update-user.php" data-qa-id="account-widgets-account-info-update">Update</a>
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        
            <div class="col-md-3">
                <div class="rover-widget-block">
                    <div class="rover-widget-block-inner-wide">
                        <h5 class="rover-widget-title bordered-bottom">
                            <i class="rover-icon rover-icon-sitter-traveling"></i>
                            Booking
                        </h5>
                        <div class="rover-widget-body">
                            <div class="col-xs-12">
                                <ul class="list-unstyled section-links">
                                    
<li>
    





<a href="user-booking.php">Booking Detail</a>

</li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
        
    </div>

    

    <div class="row">
        
            
                


            

            


        
    </div>
    </div>
</div>
<div id="react-app"></div>


        </main>
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