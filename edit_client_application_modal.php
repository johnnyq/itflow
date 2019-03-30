<div class="modal fade" id="editClientApplicationModal<?php echo $client_application_id; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-rocket"></i> Edit Application</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="post.php" method="post" autocomplete="off">
        <input type="hidden" name="client_application_id" value="<?php echo $client_application_id; ?>">
        <div class="modal-body">    
          
          <div class="form-group">
            <label>Application Name</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-cube"></i></span>
              </div>
              <input type="text" class="form-control" name="name" placeholder="Application name" value="<?php echo $client_application_name; ?>" required>
            </div>
          </div>
          
          <div class="form-group">
            <label>Type</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-tag"></i></span>
              </div>
              <select class="form-control" name="type" required>
                <?php foreach($application_types_array as $application_type2) { ?>
                <option <?php if($client_application_type == $application_type2) { echo "selected"; } ?>><?php echo $application_type2; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        
          <div class="form-group">
            <label>License</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
              </div>
              <input type="text" class="form-control" name="license" value="<?php echo $client_application_license; ?>" required> 
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" name="edit_client_application" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>