<?php
$action = get_mr_theme_root_uri() . '/ajax.php';
?>
<div class="modal fade" id="mr-ix-signup">
  <div class="modal-dialog">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Signup to Info Exchange</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="ix-signup-modal-message"></div>
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" name="ix-firstname" id="ix-firstname" value="" placeholder="First Name">
              </div>
              <div class="form-group">
                <input type="text" name="ix-lastname" id="ix-lastname" value="" placeholder="Last Name">
              </div>
              <div class="form-group">
                <input type="text" name="ix-email" id="ix-email" value="" placeholder="Email Address">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="ix-subscribe">Subscribe</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

