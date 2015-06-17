<?php
$fb = get_mr_theme_root_uri() . '/images/icon-footer-facebook.png';
$tw = get_mr_theme_root_uri() . '/images/icon-footer-twitter.png';
$yt = get_mr_theme_root_uri() . '/images/icon-footer-youtube.png';
$li = get_mr_theme_root_uri() . '/images/icon-footer-linkedin.png';
?>


<div class="jumbotron dkpurplebg noBottomMargin">
  <div class="container-fluid">
  	<div class="container" id="infoExch">
	   <div class="row">

			<form id="ie" class="form-horizontal">
				<div id="ie" class="form-group">
					<label for="info-exchange-signup" class="control-label col-xs-12 col-sm-5 col-md-4 medLgText">Subscribe to Info Exchange</label>
					<div class="input-group col-xs-11 col-sm-6 col-md-8" >
						<input type="text" id="info-exchange-signup-email" name="info-exchange-signup-email" class="form-control" placeholder="you@email.com">
						<span class="input-group-btn">
		            <button class="btn btn-default ieBtn" id="ix-signup" type="button" data-toggle="modal" data-target="#mr-ix-signup"><b>SIGN UP NOW!</b></button>
		            </span>				
					</div>
				</div>			
			</form>    	
	    		   
	  </div><!-- end .row -->
  </div><!-- end .container #infoExch -->
	<div class="container"> 
      <div class="row">
      
        <div class="col-md-3"></div>
        <div class="col-md-2 text-center topMargin60"><a href="http://webhelp.monsooncommerce.com/" class="textWhite foot">Marketplace Knowledge Base</a></div>
        <div class="col-md-2 text-center topMargin60"><a href="http://www.stoneedge.com/help/" class="textWhite foot">OMS Knowledge Base</a></div>
        <div class="col-md-2 text-center topMargin60"><a href="https://sc.monsooncommerce.com/" class="textWhite foot">Solution Central</a></div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <div class="container">
	    <div class="row">
	        <div class="col-md-12 text-center topMargin60">
	          <button type="button" class="btn textBlack" id="bubble" data-toggle="modal" data-target="#mr-feedback">Feedback</button>
	        </div>
	    </div>
	    <div class="row topMargin60">
		      <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
		      <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><a href="https://www.facebook.com/monsooncommerce1" target="_blank"><img src="<?php echo $fb; ?>" alt="facebook"></a></div>
		      <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><a href="https://www.twitter.com/monsooncommerce" target="_blank"><img src="<?php echo $tw; ?>" alt="twitter"></a></div>
		      <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><a href="https://www.youtube.com/user/MonsoonCommerce" target="_blank"><img src="<?php echo $yt; ?>" alt="youtube"></a></div>
		      <div class="col-xs-2 col-sm-2 col-md-1 col-lg-1"><a href="https://www.linkedin.com/company/monsoon-commerce" target="_blank"><img src="<?php echo $li; ?>" alt="linkedin"></a></div>
		      <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
	    </div>
    </div>    
    
    <div class="container">
      <div class="row topMargin40">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
          ©2015 All rights reserved
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
    
  </div> <!-- /container-fluid -->
</div> <!-- /jumbotron -->
<?php wp_footer(); ?>
</body>
</html>
