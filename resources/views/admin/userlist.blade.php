@extends('layout.app')

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
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown link
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
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

<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h3>
                    List of the user
                </h3>
            </div>
            <div>
                <button class="btn btn-success btn-md">Add User</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="table_user">
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- JQUERY --}}
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

{{-- SWEETALERT --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- DATATABLE --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.13.1/datatables.min.js"></script>


<script>
    $(document).ready(function () {
        $('table#table_user').DataTable({
            serverSide  : true,
            processing  : true,
            retrieve    : true,
            ajax        : '{{route("admin.fetchall")}}',
            columns     : [
                {data : 'id', name : 'id'},
                {data : 'username', name : 'username'},
                {data : 'email', name : 'email'},
                {data : 'action', name : 'action', orderable : false, searchable : false},
            ]
        });
    });
</script>
