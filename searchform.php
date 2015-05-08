<?php
$url = esc_url( home_url( '/' ) );
?>
<form class="form-inline" role="search" method="get" id="searchform" action="<?php echo $url; ?>">
  <div class="form-group">
    <label class="sr-only">Search</label>
    <input type="search" class="form-control" name="s" id="s" placeholder="Search" value="Donec">
  </div>
  <button type="submit" id="searchsubmit" class="btn btn-default">Go</button>
</form>