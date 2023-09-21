<!-- Header section=================== -->
<section class="section header_section">
    <div class="header" >
      <div class="container">
         
             

          <nav class="navbar navbar-expand-lg ">
              <div class="container-fluid">
               <a href=""> <img src="{{asset('frontend/image/popular.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav popular me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                      </a>
                      <ul class="dropdown-menu" style="
                      background: #f4fd45;" >
                        <li><a class="dropdown-item" href="{{url('aboutus')}}">About Us</a></li>
                        <li><a class="dropdown-item" href="mission.html">Mission</a></li>
                        
                        <li><a class="dropdown-item" href="vision.html">Vision</a></li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" >News Events</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{url('contactus')}}" >Contact Us</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Login</a>
                    </li>
                  </ul>
                  <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="button">Search</button>
                  </form>
                </div>
              </div>
            </nav>
      </div>
  </div>