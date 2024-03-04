<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <title>
    Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
</head>
<body class="g-sidenav-show" style="background-color:#161718;">
    <div class="min-height-300 position-absolute w-100" style="background-color:rgb(112, 1, 1);"></div>
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main" style="background-color:#161718;">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
          <span class="ms-1 font-weight-bold">ARTSY COLLABS</span>
        </a>
      </div>
      <hr class="horizontal dark mt-0">
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Artists</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Projects</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{route('partners.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Partners</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{route('userproject.index')}}">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-app text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Artist With Projects</span>
            </a>
          </li>
     
          <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="../pages/profile.html">
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Profile</span>
            </a>
          </li>
   
        </ul>
      </div>
    
    </aside>
    <main class="main-content position-relative border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Type here...">
              </div>
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="{{route('logout')}}" class="nav-link text-white font-weight-bold px-0">
                  
                  <img src="{{ Auth::user()->getFirstMediaUrl('images')}}" alt="" srcset="" style="width: 40px;height:40px;border-radius:50%;margin-right:10px;">
                  <span class="d-sm-inline d-none">Logout</span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item px-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0">
                  <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                </a>
              </li>
              <li class="nav-item dropdown pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-bell cursor-pointer"></i>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New message</span> from Laur
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li class="mb-2">
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="my-auto">
                          <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            <span class="font-weight-bold">New album</span> by Travis Scott
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item border-radius-md" href="javascript:;">
                      <div class="d-flex py-1">
                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="text-sm font-weight-normal mb-1">
                            Payment successfully completed
                          </h6>
                          <p class="text-xs text-secondary mb-0">
                            <i class="fa fa-clock me-1"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>  
      <!-- End Navbar -->
      <div class="container-fluid py-4" >
        <div class="row" >
          <div class="col-12" >
            <div class="card mb-4" style="background-color:#161718;">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="background-color:#161718;">
                <h6>Authors table</h6>
                <a class="btn btn-primary" href="{{route('projects.create')}}">Create new</a>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start_Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End_Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Craeted_at</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($artProject as $project)
                          
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <a href="{{route('home.show' , $project->id)}}"><img src="{{$project->getFirstMediaUrl('images')}}" class="avatar avatar-sm me-3" alt="user1"></a>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm text-light"> {{$project->title}}</h6>
                              <p class="text-xs text-secondary mb-0"> Domain</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          @php
                            $desc = str_word_count($project->description)> 10 ? \Illuminate\Support\Str::limit($project->description, 70) : $project->description;
                          @endphp
                          <p class="text-xs font-weight-bold mb-0">{{$desc}}</p>
                        </td>
                        <td>
                    
                          <p class="text-xs font-weight-bold mb-0"><span class="text-success">$ </span>{{$project->budget}}</p>
                        </td>
                        <td>
                      
                          <p class="text-xs font-weight-bold mb-0">{{$project->start_date}}</p>
                        </td>
                        <td>
                      
                          <p class="text-xs font-weight-bold mb-0">{{$project->end_date}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="#" class="status-badge" data-project-id="{{ $project->id }}" data-status="{{ $project->status }}">
                              @if ($project->status_label === 'Pending')
                                  <span class="badge badge-sm bg-gradient-warning">{{ $project->status_label }}</span>
                              @elseif ($project->status_label === 'Accepted')
                                  <span class="badge badge-sm bg-gradient-success">{{ $project->status_label }}</span>
                              @else
                                  <span class="badge badge-sm bg-gradient-danger">{{ $project->status_label }}</span>
                              @endif
                          </a>
                      </td>
                      
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> {{$project->created_at}}</span>
                        </td>
                        <td >
                          <div class="d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="font-weight-bold text-xs me-5 text-primary" data-toggle="tooltip" data-original-title="Edit user">
                              Edit
                            </a>
                            <form action="{{route('projects.destroy' , $project->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" style="background-color: transparent;border:none;">
                                Delete
                              </button>
                            </form>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" style="background-color: #161718">
                  <div class="modal-header">
                      <h5 class="modal-title" id="updateStatusModalLabel" style="background-color: #161718">Update Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="background-color: #161718">
                    <form id="updateStatusForm" action="{{ route('projectss.update', ['projectss' => $project->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="status">Status:</label>
                          <select class="form-control text-light" id="status" name="status" style="background-color: #161718">
                              <option value="0">Pending</option>
                              <option value="1">Accepted</option>
                              <option value="2">Refused</option>
                          </select>
                      </div>
                      <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                      <button type="submit" class="btn btn-primary">Update Status</button>
                  </form>
                </div>
              </div>
          </div>
      </div>
      <div class="py-4" >
        <div class="row" >
          <div class="col-12" >
            <div class="card mb-4" style="background-color:#161718;">
              <div class="card-header pb-0 d-flex justify-content-between align-items-center" style="background-color:#161718;">
                <h6>Deleted Projects</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Project</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Budget</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Start_Date</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">End_Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Craeted_at</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                          
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="{{$project->getFirstMediaUrl('images')}}" class="avatar avatar-sm me-3" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm text-light"> {{$project->title}}</h6>
                              <p class="text-xs text-secondary mb-0"> Domain</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          @php
                            $desc = str_word_count($project->description)> 10 ? \Illuminate\Support\Str::limit($project->description, 70) : $project->description;
                          @endphp
                          <p class="text-xs font-weight-bold mb-0">{{$desc}}</p>
                        </td>
                        <td>
                    
                          <p class="text-xs font-weight-bold mb-0"><span class="text-success">$ </span>{{$project->budget}}</p>
                        </td>
                        <td>
                      
                          <p class="text-xs font-weight-bold mb-0">{{$project->start_date}}</p>
                        </td>
                        <td>
                      
                          <p class="text-xs font-weight-bold mb-0">{{$project->end_date}}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <a href="#" class="status-badge" data-project-id="{{ $project->id }}" data-status="{{ $project->status }}">
                              @if ($project->status_label === 'Pending')
                                  <span class="badge badge-sm bg-gradient-warning">{{ $project->status_label }}</span>
                              @elseif ($project->status_label === 'Accepted')
                                  <span class="badge badge-sm bg-gradient-success">{{ $project->status_label }}</span>
                              @else
                                  <span class="badge badge-sm bg-gradient-danger">{{ $project->status_label }}</span>
                              @endif
                          </a>
                      </td>
                      
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold"> {{$project->created_at}}</span>
                        </td>
                        <td >
                          <div class="d-flex align-items-center justify-content-center">
                            <form action="{{ route('projects.restore', ['project' => $project->id]) }}" method="POST">
                              @method('PUT')
                              @csrf
                              <button type="submit" class="font-weight-bold text-xs text-success" data-toggle="tooltip" data-original-title="Restore project" style="background-color: transparent;border:none">
                                Restore
                            </button>
                            </form>
                        </div>
                        </td>
                      </tr>
                      @endforeach
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="updateStatusModal" tabindex="-1" aria-labelledby="updateStatusModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" style="background-color: #161718">
                  <div class="modal-header">
                      <h5 class="modal-title" id="updateStatusModalLabel" style="background-color: #161718">Update Status</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="background-color: #161718">
                    <form id="updateStatusForm" action="{{ route('projectss.update', ['projectss' => $project->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="status">Status:</label>
                          <select class="form-control text-light" id="status" name="status" style="background-color: #161718">
                              <option value="0">Pending</option>
                              <option value="1">Accepted</option>
                              <option value="2">Refused</option>
                          </select>
                      </div>
                      <input type="hidden" id="project_id" name="project_id" value="{{$project->id}}">
                      <button type="submit" class="btn btn-primary">Update Status</button>
                  </form>
                </div>
              </div>
          </div>
      </div>
      
        <footer class="footer pt-3  ">
          <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
              <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                  © <script>
                    document.write(new Date().getFullYear())
                  </script>,
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                  for a better web.
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </main>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
      </a>
      <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
          <div class="float-start">
            <h5 class="mt-3 mb-0">Argon Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-end mt-4">
            <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors my-2 text-start">
              <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
              <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="d-flex my-3">
            <h6 class="mb-0">Navbar Fixed</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
          </div>
          <hr class="horizontal dark my-sm-4">
          <div class="mt-2 mb-5 d-flex">
            <h6 class="mb-0">Light / Dark</h6>
            <div class="form-check form-switch ps-0 ms-auto my-auto">
              <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
            </div>
          </div>
          <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
          <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
          <div class="w-100 text-center">
            <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
            <h6 class="mt-3">Thank you for sharing!</h6>
            <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
              <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
            </a>
          </div>
        </div>
      </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


 
    @if (session('status'))
    <script>
        setTimeout(function() {
            Swal.fire({
                title: 'Success',
                text: '{{ session('status') }}',
                icon: 'success',
                background : '#161718',
                confirmButtonClass: 'btn btn-success', 
                confirmButtonText: 'Cancel',
                confirmButtonColor: 'rgb(112, 1, 1)',
            });
        }, {{ session('delay', 0) }});
    </script>
    @endif


    <script>
    $('.status-badge').click(function () {
    var projectId = $(this).data('project-id');
    var status = $(this).data('status'); // Get the status from data attribute

    // Set the value of the select element to the status
    $('#status').val(status);

    $('#project_id').val(projectId); 

    $('#updateStatusModal').modal('show'); 
});
  </script>
  


  </body>
  </html>