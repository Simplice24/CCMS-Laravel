<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link a href="CSS/Style.css" rel="stylesheet">


     <!-- Favicon -->
     <link href="img/favicon.ico" rel="icon">

     <!-- Google Font -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 
 
     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
 
     <!-- Libraries Stylesheet -->
     <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
     
<!-- login links-->
<link rel="stylesheet" href="CSS/login-style.css">
<script src="JS/login-verification.js"></script>
<script src="JS/loginpop.js"></script>
<!-- End of login -->

    <title>Coffe Cooperatives Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Coffee Cooperatives MS</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#home" style="float:right; !important">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#About_us" style="float:right; !important">About Us</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#Services" style="float:right; !important">Services</a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#Contact_us" style="float:right; !important">Contact Us</a>
              </li>
              
              
            </ul>
            <a href="<?=url('login');?>"><button type="button" class="btn btn-outline-primary" id="login">Login</button></a>
            <!--<form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>-->

          </div>
        </div>
      </nav>



 <!--Start of login-->

 <div class="container-fluid" >
  <div class="card-container1" id="card-container1">
  <div class="mb-3">
      <h2>Login</h2>
  </div>
  <div class="mb-3">
    <div class="input-icon">
      <i class="fa fa-envelope"></i>
    <input type="email" class="form-control" id="email" name="username" placeholder="Email" required/>
    </div>
    </div>
    <div class="mb-3">
      <div class="input-icon">
        <i class="fa fa-lock"></i>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
    </div>
    </div>
    <div class="mb-3">
      <button type="button" class="btn btn-primary" onclick="checking()">Login</button>
    </div>
  </div>
</div>
<!--End of login-->

      <div class="container-fluid" id="home">
        <h1>Coffee Cooperatives Management System</h1><br>
        <p>Coffee Cooperatives Management System is a Web-based System designed to collect and supply <br> all necessary information about all coffee cooperatives in country and how they are categorized <br> according to their production line. Coffee Cooperatives Management System also provide information <br> about location, members, and assets to cooperative managers, Social Economic Development Officers (SEDO), <br> Sector & District agronomist, RAB and NAEB   </p>
      </div>


      <div class="container-fluid" id="About_us">
        <h2>About Us</h2><br><br>
         <div class="card-container">
          <h3>Coffee Cooperatives Management System</h3><br>
          <p>Coffee Cooperatives Management System connect coffee cooperatives with government officials, investors, and coffee export companies to help Coffee Cooperatives to meet regional and global market</p>
         </div>
      </div>
      <div class="container-fluid" id="Services">
        <h2>Services</h2><br><br>

        <div class="row" style="text-align: center;">
          <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                  
                    <div class="col-sm-7">
                        <h4>Connecting RAB,NAEB,Agronomists,SEDOs,Cooperative Managers, and Investors</h4>
                        <p class="m-0">Coffee Cooperatives Management System connects government officials, Coffee cooperatives, and Investors who are involved in coffee farming and coffee production to standardize Coffee produced and also to make it more profitable to coffee farmers</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                   
                    <div class="col-sm-7">
                        <h4>Analysis</h4>
                        <p class="m-0">Coffee Cooperatives Management System enables RAB, NAEB, Agronomists, Social Economic Development Officers, and cooperative managers, to make analysis about each coffee cooperative</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    
                    <div class="col-sm-7">
                        <h4>Coffee Diseases Reporting</h4>
                        <p class="m-0">Coffee Cooperatives Management System makes it easier and quicker for Coffee farmers to report any disease to the Agronomists which enables them to react very quickly</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    
                    <div class="col-sm-7">
                        <h4>Accurate coffee cooperatives' information supplying</h4>
                        <p class="m-0">Coffee Cooperatives Management System enables RAB and NAEB to supply all information related to coffee cooperatives all around the country in a very easy and effective way
                        </p>
                    </div>
                </div>
            </div>
        </div>
          </div>
         
      </div>
      <div class="container-fluid" id="Contact_us">
        <h2>Contact Us</h2><br><br>
        <div class="row" style="text-align: center;">
          <div class="col-md-6">
              <div class="col-sm-4 text-center mb-3">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <h4 class="font-weight-bold">Address</h4>
                  <p>KN 67, KIGALI, RWANDA</p>
              </div>
              <div class="col-sm-4 text-center mb-3">
                 <i class="fa fa-phone" aria-hidden="true"></i>
                  <h4 class="font-weight-bold">Phone</h4>
                  <p>+25078565656</p>
              </div>
              <div class="col-sm-4 text-center mb-3">
                 <i class="fa fa-envelope-o" aria-hidden="true"></i>
                  <h4 class="font-weight-bold">Email</h4>
                  <p>info@example.com</p>
              </div>
          </div>
          <div class="col-md-5">
            <div class="col-md-10 pb-5">
            <div class="contact-form">
              <div id="success"></div>
              <form name="sentMessage" id="contactForm" novalidate="novalidate">
                  <div class="control-group">
                      <input type="text" class="form-control bg-transparent p-4" id="name" placeholder="Your Name"
                          required="required" data-validation-required-message="Please enter your name" />
                      <p class="help-block text-danger"></p>
                  </div>
                  <div class="control-group">
                    <input type="text" class="form-control bg-transparent p-4" id="email" placeholder="Your Email"
                    required="required" data-validation-required-message="Please enter a valid email" />
                <p class="help-block text-danger"></p>
                  </div>
                  <div class="control-group">
                      <input type="text" class="form-control bg-transparent p-4" id="subject" placeholder="Subject"
                          required="required" data-validation-required-message="Please enter a subject" />
                      <p class="help-block text-danger"></p>
                  </div>
                  <div class="control-group">
                      <textarea class="form-control bg-transparent py-3 px-4" rows="5" id="message" placeholder="Message"
                          required="required"
                          data-validation-required-message="Please enter your message"></textarea>
                      <p class="help-block text-danger"></p>
                  </div>
                  <div>
                      <button class="btn btn-primary font-weight-bold py-3 px-5" type="submit" id="sendMessageButton">Send
                          Message</button>
                  </div>
              </form>
          </div>
      </div>
      </div>
  </div>
</div>
          </div>
          </div>
      </div>

      <!-- Footer -->
      <footer>
        
        <i class="fa fa-facebook"></i>
        <i class="fa fa-twitter"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-google"></i>
        <i class="fa fa-linkedin"></i>
        <i class="fa fa-youtube"></i>

        <br>
        <i class="fa fa-copyright" id="copy">Copyright 2022</i>
      </footer>

</body>
</html>