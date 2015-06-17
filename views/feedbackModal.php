<?php
$action = get_mr_theme_root_uri() . '/ajax.php';
?>
<div class="modal fade" id="mr-feedback">
  <div class="modal-dialog">
    <div class="modal-content">
      <form name="feedback-form" id="feedback-form" action="<?php echo $action ?>" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Feedback</h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="feedback-modal-message"></div>
                <label class="text-center">Was this helpful?&nbsp;</label>
<!--                <div class="form-group">-->
                  <textarea rows="8"  
                            placeholder="What works for you? What would you like to see improved?"
                            id="feedback-content"
                            value=""
                            name="feedback-content">
                  </textarea>
                  <input type="hidden" name="post_method" id="post-method" value="feedback-form">
<!--                </div>-->
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->