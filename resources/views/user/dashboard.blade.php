@extends('layout.app')
@include('user.add_application')

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
              <a class="nav-link" href="{{route('leave.application_list')}}">Features</a>
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
                <a class="dropdown-item" href="">Another action</a>
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


<div class="px-4 py-5 my-5 text-center">
  <img class="d-block mx-auto mb-4" src="" alt="user photo" width="72" height="57">
  <h1 class="display-5 fw-bold">Welcome {{$user->username}}</h1>
  <div class="col-lg-6 mx-auto">
    <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
      <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
      <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
    </div>
  </div>
</div>
<option value=""></option>

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    $.ajax({
      type: "get",
      url: "{{route('user.leave_category')}}",
      success: function (response) {
        response.leave_category.forEach(element => {
          $('select#leave_category').append('<option value="'+element.id+'">'+element.name+'</option>');
        });
        $('#user_id').val('{{$user->id}}');
      }
    });
  });

  $('form#add_leave_application_form').submit(function (e) { 
    e.preventDefault();
    const fd = new FormData(this);
    $.ajax({
      type: "post",
      url: "{{route('leave.store')}}",
      data: fd,
      contentType : false,
      processData : false,
      cache : false,
      success: function (response) {
        if(response.status == 200){
          Swal.fire('Success',response.message,'success');
          $('form#add_leave_application_form')[0].reset();
          $('#add_leave_application_detail_Modal').modal('hide');
        }
      }
    });
  });
</script>