  <!-- Modal -->
  <div class="modal fade" id="add_leave_application_detail_Modal" tabindex="-1" role="dialog" aria-labelledby="add_leave_application_detail_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_leave_application_detail_ModalLabel">Add leave_application Detail</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="add_leave_application_form">
            <input type="text" name="user_id" value="" id="user_id" hidden>
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="from-label">Category</label>
                    <select name="leave_category" id="leave_category" class="form-control">
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Title</label>
                    <input type="text" class="form-control" name="leave_name">
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Description</label>
                    <textarea name="leave_description" id="" cols="6" rows="2" class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="from-label">Start Date</label>
                            <input type="date" class="form-control" name="leave_start_date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="from-label">End Date</label>
                            <input type="date" class="form-control" name="leave_end_date">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Support File (if any) </label>
                    <input type="file" class="form-control" name="leave_file">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>