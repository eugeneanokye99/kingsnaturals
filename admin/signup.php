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


    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 content-center" style="min-height: 100vh;">
                <div class="bg-white rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.php">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>KingsNaturals</h3>
                        </a>
                        <h3>Sign Up</h3>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="" id="floatingText" class="form-control" placeholder="Company Name">
                        <label for="floatingText">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="" id="floatingInput" class="form-control" placeholder="Company Email">
                        <label for="floatingInput">Email Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="" id="floatingPassword" class="form-control" placeholder="Password">
                        <label for="formPassword">Password</label>
                    </div>


                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="" id="egCheck1" class="form-check-input">
                            <label for="egCheck1">Check me out</label>
                        </div>
                        <a href="#">Forgot Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">
                        Sign Up
                    </button>

                    <p class="text-center mb-0">Already have an account?<a href="signin.php">Sign In</a></p>
                </div>
            </div>
        </div>
    </div>

    <?php include "javascript.php"; ?>
  </body>
</html>
