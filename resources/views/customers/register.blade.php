<!doctype html>
<html lang="zxx">
    
<!-- Mirrored from templates.envytheme.com/luvion/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:27 GMT -->
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/bootstrap.min.css')}}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/animate.min.css')}}">
        <!-- Font Awesome Min CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/fontawesome.min.css')}}">
        <!-- FlatIcon CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/flaticon.css')}}">
        <!-- Magnific Popup Min CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/magnific-popup.min.css')}}">
        <!-- NiceSelect CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/nice-select.css')}}">
        <!-- Slick Min CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/slick.min.css')}}">
        <!-- MeanMenu CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/meanmenu.css')}}">
        <!-- Odometer CSS -->
		<link rel="stylesheet" href="{{asset('public/main/css/odometer.min.css')}}">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/style.css')}}">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="{{asset('public/main/css/responsive.css')}}">

        <title>Sharpower | Login</title>

        <link rel="icon" type="image/png" href="{{asset('public/main/img/favicon.png')}}">
        <style>
            .login-content .login-form form .connect-with-social a.facebook {
                border-color: #3b5998;
                color: #3b5998;
            }
            .login-content .login-form form .connect-with-social a {
                display: block;
                width: 100%;
                position: relative;
                border: 1px solid #ee0979;
                background-color: transparent;
                -webkit-transition: .5s;
                transition: .5s;
                padding: 11px 30px;
                border-radius: 2px;
                color: #ee0979;
                font-family: Raleway,sans-serif;
                font-weight: 500;
            }
            .login-content .login-form form .connect-with-social a i {
                position: absolute;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
                left: 15px;
                font-size: 20px;
            }
            .fab {
                font-family: "Font Awesome 5 Brands";
            }
            .fab, .fal, .far, .fas {
                -moz-osx-font-smoothing: grayscale;
                -webkit-font-smoothing: antialiased;
                display: inline-block;
                font-style: normal;
                font-variant: normal;
                text-rendering: auto;
                line-height: 1;
            }
        </style>
    </head>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->

        <!-- Start Login Area -->
        <section class="login-area">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-image">
                        <img src="{{asset('public/main/img/login-bg.jpg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="login-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="login-form">
                                    <div class="logo">
                                        <a href="{{url('/')}}"><img style="width:auto; height: 40px" src="{{asset('public/main/img/black-logo.png')}}" alt="image"></a>
                                    </div>

                                    <h3>Welcome back</h3>
                                    <p>Have an account already? <a href="{{url('login')}}">Sign in</a></p>

                                    <form method="POST" action="{{url('save_customer')}}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input name="name" id="name" required placeholder="Your full name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input name="phone" id="phone" required placeholder="Your phone" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" required placeholder="Your email address" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" required id="password" placeholder="Your password" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Sign up</button>
                                        
                                        <div class="forgot-password">
                                            <a href="{{url('forgot_password')}}">Forgot Password?</a>
                                        </div>

                                        <div class="connect-with-social">
                                            <a class="facebook" href="{{url('login')}}"><i class="fa fa-user"></i> Sign in</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->

        <!-- jQuery Min JS -->
        <script src="{{asset('public/main/js/jquery.min.js')}}"></script>
        <!-- Popper Min JS -->
        <script src="{{asset('public/main/js/popper.min.js')}}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{asset('public/main/js/bootstrap.min.js')}}"></script>
        <!-- Mean Menu JS -->
        <script src="{{asset('public/main/js/jquery.meanmenu.js')}}"></script>
        <!-- NiceSelect Min JS -->
        <script src="{{asset('public/main/js/jquery.nice-select.min.js')}}"></script>
        <!-- Slick Min JS -->
        <script src="{{asset('public/main/js/slick.min.js')}}"></script>
        <!-- Magnific Popup Min JS -->
        <script src="{{asset('public/main/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- Appear Min JS -->
		<script src="{{asset('public/main/js/jquery.appear.min.js')}}"></script>
        <!-- Odometer Min JS -->
        <script src="{{asset('public/main/js/odometer.min.js')}}"></script>
        <!-- Parallax Min JS -->
        <script src="{{asset('public/main/js/parallax.min.js')}}"></script>
        <!-- WOW Min JS -->
        <script src="{{asset('public/main/js/wow.min.js')}}"></script>
        <!-- Form Validator Min JS -->
        <script src="{{asset('public/main/js/form-validator.min.js')}}"></script>
        <!-- Contact Form Min JS -->
        <script src="{{asset('public/main/js/contact-form-script.js')}}"></script>
        <!-- Main JS -->
        <script src="{{asset('public/main/js/main.js')}}"></script>
         
	<script src="{{asset('public/admin/sweetalert/docs/assets/sweetalert/sweetalert.min.js')}}"></script>
    
    @if(Session::has('success'))
      
      <script>
        swal({
          title: "Success!",
          text: "{{Session::get('success')}}",
          icon: "success",
          buttons: true,
          //dangerMode: true,
        });
        
        </script>
      
    @endif
    @if(Session::has('error'))
        <script>
        swal("Error!", "{{Session::get('error')}}", "error").then((value) => {
            });
        </script>
    
    @endif
    @if(Session::has('info'))
    <script>
    swal({
          title: "Info!",
          text: "{{Session::get('info')}}",
          icon: "info",
          buttons:  ["Later", "Login or Register now"],
          //dangerMode: true,
        })
        .then((login) => {
          if (login) {
            $("#meLogin").modal("toggle");
          } else {
            
          }
        });
    </script>
    
    @endif
    @if(Session::has('info2'))
    <script>
    swal({
          title: "Info!",
          text: "{{Session::get('info2')}}",
          icon: "info",
          buttons:  ["Later", "Fund wallet now"],
          //dangerMode: true,
        })
        .then((fund) => {
          if (fund) {
            window.open("/customers/profile", "_self");
          } else {
            
          }
        });
    </script>
    
    @endif
    </body>

<!-- Mirrored from templates.envytheme.com/luvion/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:28 GMT -->
</html>