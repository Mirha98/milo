  <!-- Modal -->
  <div class="modal fade" id="view_leave_application_Modal" tabindex="-1" role="dialog" aria-labelledby="view_leave_application_detail_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view_leave_application_detail_ModalLabel">view leave_application Detail</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="post" id="view_leave_application_form">
            <input type="text" name="view_application_id" value="" id="view_application_id" hidden>
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="from-label">Applicant's Name</label>
                    <input type="text" class="form-control" name="view_leave_fullname" id="view_leave_fullname" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Applicant's Email</label>
                    <input type="text" class="form-control" name="view_leave_email" id="view_leave_email" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Category</label>
                    {{-- <select name="view_leave_category" id="view_leave_category" class="form-control">
                    </select> --}}
                    <input type="text" class="form-control" name="view_leave_category" id="view_leave_category" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Title</label>
                    <input type="text" class="form-control" name="view_leave_name" id="view_leave_name" disabled>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Description</label>
                    <textarea name="view_leave_description" id="view_leave_description" cols="6" rows="2" class="form-control" disabled></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="from-label">Start Date</label>
                            <input type="date" class="form-control" name="view_leave_start_date" id="view_leave_start_date" disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="from-label">End Date</label>
                            <input type="date" class="form-control" name="view_leave_end_date" id="view_leave_end_date" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="from-label">Support File (if any) </label>
                    <input type="file" class="form-control" name="view_leave_file" id="view_leave_file"disabled>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-circle-minus"></i></button>
              <button type="button" class="btn btn-danger btnRejectLeave" appStatus="0"><i class="fa-solid fa-circle-xmark"></i></button>
              <button type="submit" class="btn btn-success btnApproveLeave" appStatus="1"><i class="fa-solid fa-circle-check"></i></button>
            </div>
        </form>
      </div>
    </div>
  </div>