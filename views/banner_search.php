<?php
  $action = isset($action) ? $action : esc_url(home_url('/'));
?>
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
  <form role="search" method="get" id="searchform" action="<?php echo $action ?>">
    <div class="input-group">
      <input type="search" class="form-control input-lg" name="s" id="s" placeholder="Search" value="">
      <span class="input-group-btn">
        <button type="submit" id="searchsubmit" class="btn btn-lg btn-search">Go</button>
      </span>
    </div>
  </form>
</div>
  <div class="col-lg-2"></div>
  <p>&nbsp;</p>
</div>