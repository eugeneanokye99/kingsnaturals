<?php
$current_page = basename($_SERVER['PHP_SELF']);
$show_login_signup = !isset($_COOKIE['uid']);
?>

<nav>
    <div class="container nav-container">
        <a href="index.php" class="logo">
            <div><span>kings</span></div>
            <div>Naturals</div>
        </a>
        <ul class="navlist">
            <li><a href="<?php echo ($current_page == 'index.php') ? '#home' : '../index.php#home'; ?>" class="active">home</a></li>
            <li><a href="<?php echo ($current_page == 'index.php') ? '#about' : '../index.php#about'; ?>">about</a></li>
            <li><a href="<?php echo ($current_page == 'index.php') ? '#services' : '../index.php#services'; ?>">services</a></li>
            <li><a href="<?php echo ($current_page == 'index.php') ? '#shop' : '../index.php#shop'; ?>">shop</a></li>
            <li><a href="<?php echo ($current_page == 'index.php') ? '#blog' : '../index.php#blog'; ?>">blog</a></li>
            <li><a href="<?php echo ($current_page == 'index.php') ? '#contact' : '../index.php#contact'; ?>">contact</a></li>
            <?php if ($show_login_signup): ?>
                <li><a href="src/register.php">Login/Signup</a></li>
            <?php endif; ?>
        </ul>
        <div class="nav-icons">
            <div class="menu-btn">
                <span class="lnr lnr-menu"></span>
            </div>
            <span class="lnr lnr-heart"></span>
            <span class="lnr lnr-cart"></span>
        </div>
    </div>
</nav>
