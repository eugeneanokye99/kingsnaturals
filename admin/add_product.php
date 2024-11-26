<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include "metatags.php"; ?>   
  </head>
  <body>
    <div class="container-fluid position-relative d-flex p-0">
      <!-- Spinner start -->
      <?php include "includes/spinner.php"; ?>
    


    <!-- Sidebar Start -->
    <?php include "includes/sidebar.php"; ?>


    <!-- Content Start -->
    <div class="content">
      <!-- Navbar Start -->
      <?php include "includes/navbar.php"; ?>


      <!-- Add User -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-12 col-xl-6">
            <div class="bg-white rounded h-100 p-4">
              <h6 class="mb-4">Add User</h6>
              <form action="">
                <div class="mb-3">
                  <label for="inputName" class="form-label">Full Name</label>
                  <input type="text" name="" id="inputName" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="inputEmail" class="form-label">Email Address</label>
                  <input type="text" name="" id="inputEmail" class="form-control" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="inputPassword" class="form-label">Password</label>
                  <input type="text" name="" id="inputPassword" class="form-control">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" name="" id="exampleCheck1" class="form-check-input">
                  <label for="exampleCheck1" class="form-control-label">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Add User End -->


      <!-- Footer Start -->
      <?php include "includes/footer.php"; ?>


    </div>

    <!-- Content End -->

    <!-- Back to Top -->
    <a href="" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>


    <?php include "javascript.php"; ?>
  </body>
</html>
