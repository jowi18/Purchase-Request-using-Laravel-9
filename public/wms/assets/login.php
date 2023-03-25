<?php
session_start();
if(isset($_SESSION['token'])){
    header('Location: /Glacier-WMS/dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
     <!-- Bootstrap CSS Files -->
     <link rel="stylesheet" href="node_modules/bootstrap-5.1.3/css/bootstrap.min.css">
    
    <!----===== Boxicon CSS ===== -->
    <link rel="stylesheet" href="node_modules/boxicons-2.1.4/css/boxicons.min.css">

    <!----===== Tabulator CSS ===== -->
    <link rel="stylesheet" href="node_modules/tabulator-tables/dist/css/tabulator_bootstrap5.min.css">

    <!-- =====LOGIN CSS===== -->
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <!-- WIDESCREEN -->
    <div id="widescreen">
        <div class="login-content">
            <div class="image">
                <div class="text">
                    <h1 id="greet">Good Day</h1>
                    <p>Glacier South Refrigiration Services Corportion.</p>
                </div>
                <div class="datetime">
                    <h1 id="time">asdas</h1>
                    <h1 id="date">asdas</h1>
                </div>
            </div>
            <div class="loginbox my-auto mx-4">
                <div class="logo">
                    <img src="assets/img/GILILOGO3.png" alt="">
                    <h2>GLACIER</h2>
                    <label>MEGAFRIDGE</label>
                </div>
                <div class="text-start mb-3">
                    <h2 class="font-size-lg">Welcome</h2>
                    <span class="text-muted">Before you get started, you must login or register if you don't already have an account.</span>
                </div>
                <form method="post" id="loginform-desktop">
                    <div class="alert alert-success" role="alert" id="alert">
                        A simple secondary alert—check it out!
                    </div>
                    <div class="form-floating mb-4 position-relative"> 
                        <i class='bx bx-user-circle position-absolute icon'></i>
                        <input type="text" class="form-control label" name="uname" id="uname" placeholder="Username">
                        <label for="uname" class="text-muted label">Enter Your Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <i class='bx bxs-lock position-absolute icon'></i>
                        <input type="password" class="form-control label" name="pass" id="pass" placeholder="Password">
                        <label for="pass" class="text-muted label">Enter Your Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="showpass">
                        <label class="form-check-label" for="showpass">Show Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg rounded" type="submit"><i class='bx bxs-door-open'></i> SIGN IN</button>
                    </div>
                    <div class="text-center mt-2">
                        <a class="btn btn-link text-decoration-none">Forgot Password?</a>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- WIDESCREEN END-->

    <!-- SMALLSCREEN START-->
    <div id="smallscreen" class="position-relative">
        <div class="datetime position-absolute top-0 end-0 pt-2 pe-2">
            <h1 id="time">asdas</h1>
            <h1 id="date">asdas</h1>
        </div>
        <div class="login-content-small">
            <div class="login-box-small position-relative">
                <div class="small-logo position-absolute top-0 start-50 translate-middle">
                    <img src="assets/img/GILILOGO3.png" alt="">
                    <h2>GLACIER</h2>
                    <label>MEGAFRIDGE</label>
                </div>
                <div class="text-start mt-5 pt-4">
                    <h2 class="font-size-lg">Welcome</h2>
                    <span class="text-muted">Before you get started, you must login or register if you don't already have an account.</span>
                </div>
                <form id="loginform-mobile" class="pt-3">
                    <div class="alert alert-success" role="alert" id="alert">
                        A simple secondary alert—check it out!
                    </div>
                    <div class="form-floating mb-4 position-relative"> 
                        <i class='bx bx-user-circle position-absolute icon'></i>
                        <input type="text" class="form-control label" name="uname" id="uname" placeholder="Username">
                        <label for="uname" class="text-muted label">Enter Your Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <i class='bx bxs-lock position-absolute icon'></i>
                        <input type="password" class="form-control label" name="pass" id="pass" placeholder="Password">
                        <label for="pass" class="text-muted label">Enter Your Password</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="showpass">
                        <label class="form-check-label" for="showpass">Show Password</label>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg rounded" type="submit"><i class='bx bxs-door-open'></i> SIGN IN</button>
                    </div>
                    <div class="text-center mt-2">
                        <a class="btn btn-link text-decoration-none">Forgot Password?</a>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- SMALLSCREEN END -->

    <!-- JQUERY JS SCRIPTS -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap JS Scripts -->
    <script src="node_modules/bootstrap-5.1.3/js/bootstrap.bundle.min.js"></script>

    <!-- Tabulator JS Scripts -->
    <script src="node_modules/tabulator-tables/dist/js/tabulator.min.js"></script>

    <!-- Custom JS Scripts -->
    <script src="assets/js/login.js"></script>
</body>
</html>