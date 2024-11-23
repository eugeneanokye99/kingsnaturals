<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "metatags.php"; ?>
  </head>
  <body>
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner start -->
      <?php include "includes/spinner.php"; ?>
    </div>


    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>KingsNaturals</h3>
                        </a>
                        <h3>Sign In</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="" id="floatingInput" class="form-control" placeholder="name@kings.com">
                        <label for="floatingInput">Email</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="" id="floatingPassword" class="form-control">
                        <label for="floatingPassword">Password</label>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="form-check">
                        <input type="checkbox" name="" id="exmCheck1" class="form-check-input">
                        <label for="exmCheck1" class="form-check-label">Check me out</label>
                      </div>
                      <a href="#">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                      Sign in
                    </button>
                    <p class="text-center mb-0">Don't have an account? <a href="signup.php">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>


   <?php include "javascript.php"; ?>
  </body>
</html>
