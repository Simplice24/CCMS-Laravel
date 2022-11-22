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
            <button type="button" class="btn btn-danger"><i class="fa fa-user"></i>&nbsp; Logout</button>
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
        <div class="updating">
      <h2>Fill in the form to update system user</h2>
      <form class="form-horizontal" action="{{url('updateUser/'.$userinfo->id)}}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Name:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="fillname" name="name" value="{{$userinfo->name}}" required/>
          </div>
        </div>
      
        <div class="form-group">
            <label class="control-label col-sm-2" for="gender">Gender</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fillname" name="gender"  value="{{$userinfo->gender}}" required/>

            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-2" for="coopname">Role:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="CoopName" name="role"  value="{{$userinfo->role}}"  required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="coopname">Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username"  value="{{$userinfo->username}}" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="coopname">Password:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password"  value="{{$userinfo->password}}"  required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="coopname">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email"  value="{{$userinfo->email}}" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="phone">Phone:</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="phone" name="phone"  value="{{$userinfo->phone}}" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="province">Province:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="province" name="province"  value="{{$userinfo->province}}"  required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="district">District:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="district"  value="{{$userinfo->district}}" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Sector:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sector" name="sector"  value="{{$userinfo->sector}}" required/>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="email">Cell:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cell" name="cell"  value="{{$userinfo->cell}}" required/>
            </div>
          </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-dark" id="Add"><i class="fa fa-plus"> Update</i></button>
            <a href="<?=url('viewsystemuser');?>"><button type="button" class="btn btn-primary" id="Add">Go back</button></a>
          </div>
        </div>
      </form>
      </div>
      </div>
    </div>
       </div>
    </div>
    </div>
    <script src="../JS/app.js"></script>
    
    
</body>
</html>