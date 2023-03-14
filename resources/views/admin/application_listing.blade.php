@extends('layout.app')
@include('admin.view_leave_application')

<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
    <div>
        <a class="navbar-brand" href="#">Navbar</a>
    </div>
    <div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#add_leave_application_detail_Modal">Leave</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="{{route('user.view')}}">User's Detail</a>
                <a class="dropdown-item" href="#">Another action</a>
                <form action="{{route('user.logout')}}" method="post">
                    @csrf
                    <a href=""><button class="btn" type="submit">Logout</button></a>
                </form>
            </div>
            </li>
        </ul>
        </div>
    </div>
</nav>

<div class="container py-5 table-responsive">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h3>Application Listing</h3>
            </div>
            <div>
                <button class="btn btn-info btn-md">Print</button>
            </div>
        </div>
        <div class="card-body table-responsive">
            <div class="container table-responsive">
                <table class="table" id="table_application_listing">
                    <thead class="thead-dark">
                        <th>ID</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td>1</td>
                            <td>Annual Leave<span class="badge badge-warning">Warning</span></td>
                            <td>Balik Kampung</td>
                            <td><input type="file" class="form-control" disabled></td>
                            <td>15 </td>
                            <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                            <td class="overflow-auto"> 
                                <button class="btn btn-success btn-sm">View</button>
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>


<script>
    
    // $('#tekan').on('click', function () {
    // });

    fetchall();

    function fetchall(){
        let user_id  = {{Auth::user()->id}};
        $('#table_application_listing').DataTable({
            serverSide : true,
            processing : true,
            ajax : "{{route('leave.all')}}",
            columns : [
                {data:'id', name:'id'},
                {data:'category_id', name:'category_id'},
                {data:'name', name:'name'},
                {data:'file', name:'file'},
                {data:'duration', name:'duration'},
                {data:'status', name:'status'},
                {data:'action', name:'action', searchable: false, orderable: false},
            ]
        });
    }

    $(document).on('click','.btnViewLeaveApplication', function () {
        let user_id = $(this).val();
        // console.log(user_id);
        $.ajax({
            type: "get",
            url: "{{route('leave.application_user')}}",
            data: {
                user_id : user_id,
                _token  : '{{csrf_token()}}',
            },
            success: function (response) {
                let fullname = response.user_detail.first_name+' '+response.user_detail.last_name;

                $('#view_application_id').val(response.leave_application.id);
                $('#view_leave_name').val(response.leave_application.name);
                $('#view_leave_category').val(response.category.name);
                $('#view_leave_description').val(response.leave_application.description);
                $('#view_leave_start_date').val(response.leave_application.start_date);
                $('#view_leave_end_date').val(response.leave_application.end_date);
                $('#view_leave_fullname').val(fullname);
                $('#view_leave_email').val(response.user.email);
            }
        });
        
    });

    $('#view_leave_application_form').submit(function (e) { 
        e.preventDefault();
        const fd = new FormData(this);
        // const status = $(this).attr('appStatus');`
        $.ajax({
            type: "post",
            url: "{{route('leave.status')}}",
            data: fd,
            contentType : false,
            processData : false,
            cache : false,
            success: function (response) {
                if(response.status == 200){
                    swal.fire('Success',response.message,'success');
                }
                $('form#view_leave_application_form')[0].reset();
                $('#view_leave_application_Modal').modal('hide');
            }
        });
    });
    
</script>


