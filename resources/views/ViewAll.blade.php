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
            <button type="button" class="btn btn-dark"><i class="fa fa-user"></i>&nbsp; Logout</button>
          </div>
          
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            
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
          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-biohazard"></i>&nbsp; Diseases</button>
          
        </div>
        </div>
    </div>
    <div class="Content">
    
  <div class="card-body">
    <div class="info">
    <p>Full name: {{$information->name}}<p>
    <p>Gender: {{$information->gender}}<p>
    <p>Role: {{$information->role}}<p>
    <p>username: {{$information->username}}<p>
    <p>Password: {{$information->password}}<p>
    <p>Email: {{$information->email}}<p>
    <p>Phone: {{$information->phone}}<p>
    <p>Province: {{$information->province}}<p>
    <p>District: {{$information->district}}<p>
    <p>Sector: {{$information->sector}}<p>
    <p>Cell: {{$information->cell}}<p>
    <a href="<?=url('viewsystemuser');?>"><button type="button" class="btn btn-primary">Go back</button></a>
  </div>
      </div>
    </div>

       </div>

        
    </div>
    </div>
    <script src="../JS/app.js"></script>
    
    
</body>
</html>