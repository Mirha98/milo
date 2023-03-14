@extends('layout.app')

@section('register')  
  <!-- Modal -->
  <div class="modal fade" id="register_Modal" tabindex="-1" role="dialog" aria-labelledby="register_ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="register_ModalLabel">Register Form</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('user.register')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" name="register_username">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control" name="register_email">
                </div>
                <div class="form-group">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" name="register_password">
                </div>
                <hr class="hr">
                <h3>User Details</h3>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="register_fname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="register_lname">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Address</label>
                            <textarea name="register_address" id="" cols="10" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="register_photo">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Join<i class="fa-solid fa-arrow-right-to-line"></i></button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection