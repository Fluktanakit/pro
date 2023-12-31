<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="loginform/fonts/icomoon/style.css">

    <link rel="stylesheet" href="loginform/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="loginform/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="loginform/css/style.css">

    <title>ระบบติดตามโครงงานทางเทศโนโลยีสารสนเทศ</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('loginform/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>ระบบติดตามโครงงานทางเทศโนโลยีสารสนเทศ </h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="check_login.php" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="m_username" class="form-control" placeholder="Your Username" id="username">
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" name="m_password" class="form-control" placeholder="Your Password" id="password">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="loginform/js/jquery-3.3.1.min.js"></script>
    <script src="loginform/js/popper.min.js"></script>
    <script src="loginform/js/bootstrap.min.js"></script>
    <script src="loginform/js/main.js"></script>
  </body>
</html>