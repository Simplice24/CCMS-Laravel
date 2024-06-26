
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Required meta tags --> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CCMS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <!-- base:css -->
  <link rel="stylesheet" href="Customized/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="Customized/vendors/feather/feather.css">
  <link rel="stylesheet" href="Customized/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="Customized/vendors/flag-icon-css/css/flag-icon.min.css"/>
  <link rel="stylesheet" href="Customized/vendors/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="Customized/vendors/jquery-bar-rating/fontawesome-stars-o.css">
  <link rel="stylesheet" href="Customized/vendors/jquery-bar-rating/fontawesome-stars.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="Customized/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="Customized/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href={{"Home"}}>CCMS</a>
        <a class="navbar-brand brand-logo-mini" href={{"Home"}}>CCMS</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <!-- <li class="nav-item dropdown d-lg-flex d-none">
                <button type="button" class="btn btn-info font-weight-bold">+ Create New</button>
            </li> -->
          <li class="nav-item dropdown d-flex">
          <div class="dropdown">
  <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{ __('msg.languages') }}
  </a>

  <ul class="dropdown-menu">
    <a class="dropdown-item preview-item" href="<?=url('locale/en');?>">               
    {{ __('msg.english') }}
    </a>
    <a class="dropdown-item preview-item" href="<?=url('locale/fr');?>">               
    {{ __('msg.francais') }}
    </a>
    <a class="dropdown-item " href="<?=url('locale/kiny');?>">               
         Ikinyarwanda
    </a>
  </ul>
</div>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">{{ __('msg.settings') }}</p>
              <a class="dropdown-item preview-item" href="<?=url('userProfile');?>">               
                  <i class="icon-head"></i> {{ __('msg.profile') }}
              </a>
              <!-- <a class="dropdown-item preview-item" href="">               
                  <i class="icon-head"></i> French
              </a>
              <a class="dropdown-item preview-item" href="">               
                  <i class="icon-head"></i> English
              </a> -->
              <a class="dropdown-item preview-item" href="<?=url('logout');?>">
                  <i class="icon-inbox"></i> {{ __('msg.logout') }}
              </a>
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
          <img src="{{asset('/storage/images/users/'.$profileImg->image)}}">
          </div>
          <div class="user-name">
          {{session('user')}}
          </div>
          <div class="user-designation">
           {{$profileImg->role}}  
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?=url('Home');?>">
              <i class="icon-air-play menu-icon"></i>
              <span class="menu-title">{{ __('msg.dashboard') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=url('viewsystemuser');?>">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">{{ __('msg.system users') }}</span>
            </a>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="<?=url('viewcooperatives');?>">
              <i class="icon-disc menu-icon"></i>
              <span class="menu-title">{{ __('msg.cooperatives') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=url('viewfarmers');?>">
              <i class="icon-pie-graph menu-icon"></i>
              <span class="menu-title">{{ __('msg.farmers') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=url('viewdiseases');?>">
              <i class="icon-command menu-icon"></i>
              <span class="menu-title">{{ __('msg.diseases') }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-share menu-icon"></i>
              <span class="menu-title">Roles | Permissions</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=url('Allroles');?>"> Roles </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=url('Allpermissions');?>"> Permissions </a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">{{ __('msg.hi, welcome back!')}}</h4>
              <!-- <p class="font-weight-normal mb-2 text-muted">APRIL 1, 2019</p> -->
            </div>
          </div>
          
           <div class="row">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <a href="<?=url('viewsystemuser');?>" style="text-decoration:none; color:white;">
                  <div class="card-body">
                  <img src="Customized/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{ __('msg.system users')}}<i class="fa fa-users fa-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5">{{$rows}}</h1>
                  </div>
                  </a>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                <a href="<?=url('viewfarmers');?>" style="text-decoration:none; color:white;">
                  <div class="card-body">
                    <img src="Customized/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">{{ __('msg.farmers')}}<i class="fa fa-users fa-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5">{{$farmer}}</h1>
                  </div>
                </a>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-primary card-img-holder text-white">
                <a href="<?=url('viewcooperatives');?>" style="text-decoration:none; color:white;">
                  <div class="card-body">
                    <img src="Customized/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"> {{ __('msg.cooperatives')}} <i class="mdi mdi-chart-line-variant mdi-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5">{{$cooperative}}</h1>
                  </div>
                  </a>
                </div>
              </div>
               <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                <a href="<?=url('viewdiseases');?>" style="text-decoration:none; color:white;">
                  <div class="card-body">
                    <img src="Customized/assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3"> {{ __('msg.diseases')}} <i class="fas fa-command "></i>
                    </h4>
                    <h1 class="mb-5">{{$disease}}</h1>
                  </div>
                 </a> 
                </div>
              </div>

           </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.cooperatives')}}</h4>
                    <canvas id="cooperativeChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.diseases')}}</h4>
                    <canvas id="diseaseChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.Statuses of cooperatives')}}</h4>
                    <canvas id="coopSummaryChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.Diseases classification')}}</h4>
                    <canvas id="diseaseSummaryChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.system users')}}</h4>
                    <canvas id="SystemUsersChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.farmers')}}</h4>
                    <canvas id="farmersChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.Users gender')}}</h4>
                    <canvas id="UserSummaryChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">{{ __('msg.Farmers gender')}}</h4>
                    <canvas id="FarmerSummaryChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © CCMS 2023</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
var CoopxValues =@json($months);
var CoopyValues =@json($monthCount);
var MembyValues =@json($MemMonthCount);
var MembxValues =@json($Memmonths);
var useryvalues =@json($UserMonthCount);
var userxValues =@json($Usermonths);
var diseaseyvalues =@json($DiseaseMonthCount);
var diseasexValues=@json($Diseasemonths);
var xValues = ["Operating","Not operating"];
var yValues = [@json($ActiveData),@json($InactiveData)];
var classxValues = ["Leaf diseases","Root diseases","Bean diseases","Unclassified"];
var classyValues=[@json($LeafDiseases),@json($RootDiseases),@json($BeanDiseases),@json($UnclassifiedDiseases)];
var usersxValues =["Male","Female","Managers"];
var usersyValues =[@json($Male),@json($Female),@json($Managers)];
var farmerGenderxValues =["Male","Female"];
var genderColor=["rgb(41, 128, 185)","rgb(241, 148, 138)","rgb(39, 174, 96)"];
var statusColor=["rgb(82, 190, 128)","rgb(241, 196, 15)"];
var farmerGenderyValues =[@json($MaleFarmers),@json($FemaleFarmers)];


new Chart("cooperativeChart", {
  type: "bar",
  data: {
    labels: CoopxValues,
    datasets: [{
      label:'number of cooperatives',
      backgroundColor: "rgb(122, 73, 165)",
      data: CoopyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("coopSummaryChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: statusColor,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("diseaseSummaryChart", {
  type: "line",
  data: {
    labels: classxValues,
    datasets: [{
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(255, 206, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(255, 159, 64, 0.2)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      borderWidth: 1,
      data: classyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("SystemUsersChart", {
  type: "bar",
  data: {
    labels: userxValues,
    datasets: [
      {
      label:'number of System users',
      backgroundColor: "rgb(41, 128, 185)",
      data: useryvalues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("UserSummaryChart", {
  type: "bar",
  data: {
    labels: usersxValues,
    datasets: [{
      backgroundColor: genderColor,
      data: usersyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("farmersChart", {
  type: "bar",
  data: {
    labels: MembxValues,
    datasets: [{
      label:'number of farmers',
      backgroundColor: "rgb(173, 231, 146)",
      data: MembyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
new Chart("FarmerSummaryChart", {
  type: "bar",
  data: {
    labels: farmerGenderxValues,
    datasets: [{
      backgroundColor: genderColor,
      data: farmerGenderyValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});

new Chart("diseaseChart", {
  type: "bar",
  data: {
    labels:diseasexValues,
    datasets: [{
      label:'number of Diseases',
      backgroundColor: "rgba(237,114,105)",
      data: diseaseyvalues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
    },
    scales: {
      yAxes: [{ticks: {min: 0}}],
    }
  }
});
</script>
  <!-- base:js -->
  <script src="Customized/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="Customized/js/off-canvas.js"></script>
  <script src="Customized/js/hoverable-collapse.js"></script>
  <script src="Customized/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="Customized/vendors/chart.js/Chart.min.js"></script>
  <script src="Customized/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="Customized/js/dashboard.js"></script>
  <!-- End custom js for this page-->

</body>

</html>

