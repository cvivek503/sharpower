<!doctype html>
<html lang=zxx>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:22 GMT -->
   <head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customers.includes.head')
    <title>SharpPower Easy Online Electricity Rechage in Nigeria | Profile</title>
    <link rel=icon type="image/png" href="{{asset('public/main/img/favicon.png')}}">
    <style>
        .buy{
            color:#ee0979;
            padding-top: 50px,
        }
        .nav-link{
            color: #ccc !important;
        }
        .login-btn{
            color: #ccc !important;
        }
        .active {
            color: #ee0979 !important;
        }
        .my-active {
            background-color: #23bdb8 !important;
        }
        .green{
            background-color: #23bdb8 !important;
            color: #fff !important;
        }
        .red{
            background-color: #ee0979 !important;
            color: #fff !important;
        }
    </style>
   </head>
   <body>
      <div class=preloader>
         <div class=loader>
            <div class=shadow></div>
            <div class=box></div>
         </div>
      </div>
      <div class="navbar-area navbar-style-two">
         <div class=luvion-responsive-nav>
            <div class=container>
               <div class=luvion-responsive-menu>
                  <div class=logo> <a href="{{url('/')}}"> <img src="{{asset('public/main/img/black-logo.png')}}" alt=logo>  </a> </div>
               </div>
            </div>
         </div>
         <div class=luvion-nav>
            <div class=container>
               <nav class="navbar navbar-expand-md navbar-light">
                  <a class=navbar-brand href="{{url('/')}}"> <img src="{{asset('public/main/img/black-logo.png')}}" alt=logo> </a> 
                  <div class="collapse navbar-collapse mean-menu" id=navbarSupportedContent>
                    @include('customers.includes.sidemenu')
                  </div>
               </nav>
            </div>
         </div>
      </div>
      <!-- Start Page Title Area -->
      <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <h2>Profile</h2>
                <p>Your Profile here.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

     <!-- Start FAQ Area -->
     <section class="faq-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="faq-content contact-form">
                                <form class="form-horizontal m-t-30" id="contact-form" method="POST" action="{{url('customers/update_profile')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label>Name</label>
                                            <input class="form-control" value="{{Auth::user()->name}}" id="name" name="name" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label>Email</label>
                                            <input class="form-control" type="email" value="{{Auth::user()->email}}" id="email" name="email" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label>Phone</label>
                                            <input class="form-control" type="number" value="{{Auth::user()->phone}}" id="phone" name="phone" required >
                                        </div>
                                    </div>
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" >Update profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 80px;">
                        <div class="col-md-12">
                            <div class="faq-content contact-form">
                                <form class="form-horizontal m-t-30" id="contact-form" method="POST" action="{{url('customers/update_password')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label>Password</label>
                                            <input class="form-control" id="password" name="password" required >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-12">
                                            <label>Confirm Password</label>
                                            <input class="form-control" id="cpassword" name="cpassword" required >
                                        </div>
                                    </div>
                                    
                                    <div class="form-group text-center m-t-20">
                                        <div class="col-12">
                                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" >Update password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('customers/profile')}}">
                                    <i class="fas fa-user my-active"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title " href="{{url('customers/transactions')}}">
                                    <i class="fas fa-credit-card" ></i>
                                    Transactions
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('electricity')}}">
                                    <i class="fas fa-bolt"></i>
                                    Buy Electricity
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('airtime')}}">
                                    <i class="fas fa-phone"></i>
                                    Buy Airtime
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('data')}}">
                                    <i class="fas fa-broadcast-tower"></i>
                                    Buy Data
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('tv')}}">
                                    <i class="fas fa-tv"></i>
                                    Pay TV Subscription
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
     </section>

      @include('customers.includes.footer')
      <div class=go-top><i class="fas fa-arrow-up"></i></div>
      @include('customers.includes.script')
      </body>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:23 GMT -->
</html>