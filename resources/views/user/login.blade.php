
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('wms/img/img/GILILOGO3.png') }}" type="image/png">
    <title>Login</title>
     <!-- Bootstrap CSS Files -->
     <link rel="stylesheet" href="{{ asset('wms/plugins/bootstrap-5.1.3/css/bootstrap.min.css')}}">
    
    <!----===== Boxicon CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/boxicons-2.1.4/css/boxicons.min.css ')}}">

    <!----===== Tabulator CSS ===== -->
    <link rel="stylesheet" href="{{ asset('wms/plugins/tabulator-tables/dist/css/tabulator_bootstrap5.min.css')}}">

    <!-- =====LOGIN CSS===== -->
    <link rel="stylesheet" href="{{ asset('wms/css/login.css') }}">
    <script src="{{ asset('wms/plugins/jquery/dist/jquery.min.js ')}}"></script>

    <script src="{{ asset('wms/js/toastr.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{ asset('wms/css/toastr.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
                    <img src="{{ asset('wms/img/img/GILILOGO3.png ')}}" alt="">
                    <h2>GLACIER</h2>
                    <label>MEGAFRIDGE</label>
                </div>
                <div class="text-start mb-3">
                    <h2 class="font-size-lg">Welcome</h2>
                    <span class="text-muted">Before you get started, you must login or register if you don't already have an account.</span>
                </div>
                <form id="login-form" method="POST">
            
                    <div class="alert alert-success" role="alert" id="alert">
                        A simple secondary alert—check it out!
                    </div>
                    <div class="form-floating mb-4 position-relative"> 
                        <i class='bx bx-user-circle position-absolute icon'></i>
                        <input type="text" class="form-control label" name="email" id="email" placeholder="Email" required>
                        <label for="uname" class="text-muted label">Enter Your Username</label>
                        <div style="margin-left: 16%" class="invalid-feedback">
                            Login details incorrect
                        </div>
                    </div>
                
                    <div class="form-floating mb-3">
                        <i class='bx bxs-lock position-absolute icon'></i>
                        <input type="password" class="form-control label" name="password" id="password" placeholder="Password" required>
                        <label for="pass" class="text-muted label">Enter Your Password</label>
                        <div style="margin-left: 16%" class="invalid-feedback">
                            Login details incorrect
                        </div>
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
  
    <script>
    

        $("#login-form").submit(function(event) {
            event.preventDefault(false);
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            $.ajax({
                type: 'POST',
                url: "{{ route('login.post') }}",
                data: {
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                beforeSend: function() {
                    $('#email').removeClass('is-valid');
                    $('#email').removeClass('is-invalid');

                    $('#password').removeClass('is-valid');
                    $('#password').removeClass('is-invalid');

                    $('#form').fadeOut();
                    $('#loading').fadeIn();
                },
                success: function(response) {

                    $('#email').addClass(response.email_result);
                    $('#password').addClass(response.password_result);
                    if(response.redirect) {
                        window.location.href = response.redirect;
                       
                    }
                   // alert(response.message);

                    $('#loading').fadeOut();
                    $('#form').fadeIn(2000);
                }
                
            });
        });
   
    </script>


    <!-- SMALLSCREEN END -->

    <!-- JQUERY JS SCRIPTS -->
    <script src="{{ asset('wms/plugins/jquery/dist/jquery.min.js ')}}"></script>

    <!-- Bootstrap JS Scripts -->
    <script src="{{ asset('wms/plugins/bootstrap-5.1.3/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Tabulator JS Scripts -->
    <script src="{{ asset('wms/plugins/tabulator-tables/dist/js/tabulator.min.js')}}"></script>

    <!-- Custom JS Scripts -->
    <script src="{{ asset('wms/js/login.js')}}"></script>
</body>
</html>