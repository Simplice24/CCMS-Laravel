<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-Member</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../CSS/Dash-Member.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<link rel="stylesheet" href="../CSS/pop-style.css">
<script src="../JS/jsinfo.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Coffee Cooperatives MS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="position-absolute top-0 end-0" id="logout">
          <div class="dropdown">
  <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  {{session('user')}}
  </a>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{url('logout')}}">Logout</a></li>
  </ul>
</div>
</div>
          </div>
        </div>
      </nav>

    <div class="flex-container"> 
    <div class="d-flex align-items-start">
        <div class="Menu" id="menu">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a href="<?=url('Home');?>"><button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-home"></i>&nbsp; Dashboard</button></a>
       <a href="<?=url('viewsystemuser');?>"><button class="nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-users"></i>&nbsp; System Users</button></a>
       <a href="<?=url('viewcooperatives');?>"><button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="fa fa-users"></i>&nbsp; Cooperatives</button></a>
          <a href="<?=url('viewfarmers');?>"><button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false"><i class="fa fa-users"></i>&nbsp; Farmers</button></a>
          <button class="nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-biohazard"></i>&nbsp; Diseases</button>
          
        </div>
        </div>
    </div>
    <div class="Content">
        <button type="button" class="btn btn-primary" id="modal-btn"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Disease</button>
        <div class="modal-bg">  
    <div class="form-card">
      <h2>Add New Disease</h2>
      <form class="form-horizontal" action="viewdiseases" method="POST">
        @csrf
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Disease:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fillname" name="disease" placeholder="Enter Disease name"  required/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-dark" id="Add"><i class="fa fa-plus"> Add</i></button>
            <span class="modal-close">X</span>
          </div>
        </div>
      </form>
      </div>
    </div>


<!-- start-->

<div class="full" id="full">
  <div class="card text-center">
      <div class="card-header">
        Featured
        <span class="close-btn">X</span>
      </div>
      <div class="card-body">
        <h5>Special title treatment</h5>
        <p >With supporting text below as a natural lead-in to additional content.</p>
        
      </div>
      
    </div>
  </div>
<!-- end-->
        
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              @foreach($disease as $i)
              <td>{{  $i->id }}</td>
                <td>{{  $i->disease_name }}</td>
                <td>
                  <a href={{"updateDisease/".$i->id}}><button type="button" class="btn btn-success" ><i class="fa fa-edit" aria-hidden="true"></i>&nbsp; Update</button></a>
                  <a href={{"deletedisease/".$i->id}}><button type="button" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Delete</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

       </div>

        
    </div>
    </div>
    <script src="../JS/app.js"></script>
    
    
</body>
</html>