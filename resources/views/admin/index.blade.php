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
              <a class="nav-link" href="{{route('leave.application_list')}}">Application Listing</a>
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

<h1></h1>
<button class="btn btn-info-outline btn-lg" id="btnUserlist" onclick="location.href='{{route('admin.userlist')}}'">
  userlist
</button>

