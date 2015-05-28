<?php
$fb = get_mr_theme_root_uri() . '/images/icon-footer-facebook.png';

?>


<div class="jumbotron dkpurplebg" style="margin-bottom: 0px;">
  <div class="container-fluid">
  	<div class="container" id="infoExch">
	   <div class="row">

			<form class="form-horizontal">
				<div class="form-group">
					<label for="info-exchange-signup" class="control-label col-lg-3 medLgText">Subscribe to Info Exchange</label>
					<div class="input-group col-lg-8">
						<input type="text" id="info-exchange-signup-email" name="info-exchange-signup-email" class="form-control" placeholder="you@email.com">
						<span class="input-group-btn">
		            <button class="btn btn-default dkpurplebg textWhite textWhite:hover" id="ix-signup" type="button" data-toggle="modal" data-target="#mr-ix-signup"><b>SIGN UP NOW!</b></button>				
					</div>
				</div>			
			</form>	    	
	    		   
	  </div><!-- end .row -->
  </div><!-- end .container #infoExch -->

    <div class="row topMargin60">
      <div class="container"> 
        <div class="col-md-3"></div>
        <div class="col-md-2 text-right"><a href="#" class="textWhite textWhite:hover">Pro Webhelp</a></div>
        <div class="col-md-2 text-center"><a href="#" class="textWhite textWhite:hover">SEKB</a></div>
        <div class="col-md-2 text-left"><a href="#" class="textWhite textWhite:hover">Solution Central</a></div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
      <div class="container">
        <div class="col-md-12 text-center">
          <button type="button" class="btn textBlack" id="bubble" data-toggle="modal" data-target="#mr-feedback">Feedback</button>
        </div>
      </div>
    </div>

	<div class="container">
      <div class="row">
        <div class="col-md-2"></div>
<!--        <div class="col-md-2"><a href="https://www.facebook.com/monsooncommerce1"><img src="<?php echo $fb; ?>" alt="facebook"></a></div>-->
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
      </div>
    </div>    
    
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
          ©2015 All rights reserved
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
</div> <!-- /container -->
<?php wp_footer(); ?>
</body>
</html>
