<div class="nav-grid">
    <div class="nav-left">
        <h1>Warehouse Management System</h1>
        <i id="nav-menu" class='bx bx-menu'></i>
    </div>
    <div class="nav-right" id="show-nav-details">
        <img src="assets/img/default.png" alt="">
        <div id="nav-text">
            <p id="UserNameFullName"><?php echo $_SESSION['firstname'] . ' ' .$_SESSION['lastname'];?></p>
            <hr>
            <span><?php echo $_SESSION['role']; ?></span>
        </div>
        <i class='bx bx-chevron-down'></i>
    </div>
    <ul class="nav-settings">
        <li><a href="#" onclick="return false" data-bs-toggle="modal" data-bs-target="#WMS_ChangePassword"><i class='bx bx-lock-open-alt' ></i> Change Password</a></li>
        <hr>
        <li><a href="app/Controller/logout.php"><i class='bx bx-door-open' ></i>Logout</a></li>
    </ul>
</div>