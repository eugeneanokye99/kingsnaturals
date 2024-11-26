<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-white navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">Kings Naturals</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img src="<?php echo IMAGE_BASE_URL ?>/user.jpg" alt="" class="rounded-circle" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute
            end-0 bottom-0 p-1">

                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Eugene Anokye</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-users me-2"></i>Users
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="add_user.php" class="dropdown-item">Add Users</a>
                    <a href="manage_user.php" class="dropdown-item">Manage Users</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="far fa-file-alt me-2"></i>
                    Products
                </a>

                <div class="dropdown-menu bg-transparent border-0">
                    <a href="add_product.php" class="dropdown-item">Add Products</a>
                    <a href="manage_product.php" class="dropdown-item">Manage Products</a>
                </div>
            </div>
            <a href="orders.php" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Orders</a>
            <a href="payment.php" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Payment</a>

        </div>
    </nav>
</div>