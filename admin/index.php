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


      <!-- Sales & Revenue Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-line fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Todays Sale</p>
                <h6 class="mb-0">$1234</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-bar fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Total Sale</p>
                <h6 class="mb-0">$12345</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-area fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Revenue</p>
                <h6 class="mb-0">$12345</h6>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-xl-3">
            <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
              <i class="fa fa-chart-pie fa-3x text-primary"></i>
              <div class="ms-3">
                <p class="mb-2">Total Revenue</p>
                <h6 class="mb-0">$12345</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sales & Revenue End -->


      <!-- Sales Chart Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-12 col-xl-6">
            <div class="bg-white text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Nationwide Sales</h6>
                <a href="#">Show All</a>
              </div>
              <canvas id="nationwide-sales"></canvas>
            </div>
          </div>
          <div class="col-sm-12 col-xl-6">
            <div class="bg-white text-center rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Sales & Revenue</h6>
                <a href="#">Show All</a>
              </div>
              <canvas id="sales-revenue"></canvas>
            </div>
          </div>
        </div>
      </div>

      <!-- Sales Chart End -->
      <!-- Recent Sale Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="bg-white text-center rounded p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Sales</h6>
            <a href="#">Show All</a>
          </div>
          <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
              <thead>
                <tr class="text-dark">
                  <th scope="col">
                    <input type="checkbox" name="" id="" class="form-check-input">
                  </th>
                  <th scope="col">Date</th>
                  <th scope="col">Invoice</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                  <td>01 Jan 2024</td>
                  <td>INV-4567</td>
                  <td>Eugene Anokye</td>
                  <td>$433</td>
                  <td>Paid</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                  <td>01 Jan 2024</td>
                  <td>INV-4567</td>
                  <td>Eugene Anokye</td>
                  <td>$433</td>
                  <td>Paid</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                  <td>01 Jan 2024</td>
                  <td>INV-4567</td>
                  <td>Eugene Anokye</td>
                  <td>$433</td>
                  <td>Paid</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                  <td>01 Jan 2024</td>
                  <td>INV-4567</td>
                  <td>Eugene Anokye</td>
                  <td>$433</td>
                  <td>Paid</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="" id="" class="form-check-input"></td>
                  <td>01 Jan 2024</td>
                  <td>INV-4567</td>
                  <td>Eugene Anokye</td>
                  <td>$433</td>
                  <td>Paid</td>
                  <td><a href="#" class="btn btn-primary btn-sm">Details</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Recent Sales End -->
      <!-- Widget Start -->
      <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
          <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-white rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="mb-0">Messages</h6>
                <a href="#">Show All</a>
              </div>
              <div class="d-flex align-items-center border-bottom py-3">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle flex-shrink-0" style="width: 40px; height: 40px;">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0">Rachel Amoako</h6>
                    <small>15 minutes ago</small>
                  </div>
                  <span>Short message goes here ...</span>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-3">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle flex-shrink-0" style="width: 40px; height: 40px;">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0">Rachel Amoako</h6>
                    <small>15 minutes ago</small>
                  </div>
                  <span>Short message goes here ...</span>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-3">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle flex-shrink-0" style="width: 40px; height: 40px;">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0">Rachel Amoako</h6>
                    <small>15 minutes ago</small>
                  </div>
                  <span>Short message goes here ...</span>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-3">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle flex-shrink-0" style="width: 40px; height: 40px;">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0">Rachel Amoako</h6>
                    <small>15 minutes ago</small>
                  </div>
                  <span>Short message goes here ...</span>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-3">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle flex-shrink-0" style="width: 40px; height: 40px;">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-0">Rachel Amoako</h6>
                    <small>15 minutes ago</small>
                  </div>
                  <span>Short message goes here ...</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-white rouded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Calendar</h6>
                <a href="#">Show All</a>
              </div>
              <div id="calendar"></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-white rounded p-4">
              <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">To Do List</h6>
                <a href="#">Show All</a>
              </div>
              <div class="d-flex mb-2">
                <input type="text" name="" id="" class="form-control bg-white border-0" placeholder="Enter Task">
                <button type="button" class="btn btn-primary ms-2">Add</button>
              </div>
              <div class="d-flex align-items-center border-bottom py-2">
                <input type="checkbox" name="" id="" class="form-check-input m-0">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>Short task goes here ..</span>
                    <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-2">
                <input type="checkbox" name="" id="" class="form-check-input m-0">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>Short task goes here ..</span>
                    <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-2">
                <input type="checkbox" name="" id="" class="form-check-input m-0">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>Short task goes here ..</span>
                    <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-2">
                <input type="checkbox" name="" id="" class="form-check-input m-0">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>Short task goes here ..</span>
                    <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center border-bottom py-2">
                <input type="checkbox" name="" id="" class="form-check-input m-0">
                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span>Short task goes here ..</span>
                    <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Widget End -->

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
