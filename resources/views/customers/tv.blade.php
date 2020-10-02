<!doctype html>
<html lang=zxx>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:22 GMT -->
   <head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customers.includes.head')
    <title>SharpPower Easy Online Electricity Rechage in Nigeria | Buy TV subscription</title>
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
        .single-pricing-box .buy-btn {
            margin-top: 9px;
        }
        .buy-btn > a:before {
            background: linear-gradient(90deg,#ee0979 0,#ff6a00 100%) !important;
        }
        .airtime-image {
            width: auto;
            height: 80px;

        }
    </style>
    <script src="https://js.paystack.co/v1/inline.js"></script>
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
                  <div class=logo> <a href="{{url('/')}}"> <img src="{{asset('public/main/img/black-logo.png')}}" alt=logo> </a> </div>
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
                <h2>Buy TV Subscription</h2>
                <p>Buying TV subscription in Nigeria can't be faster.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="pricing-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box row" >
                        <div class="col-md-4">
                            <img class="airtime-image" src="{{asset('public/main/img/dstv.png')}}" alt="image">
                        </div>
                        <div class="col-md-8">
                            <div class="pricing-header">
                                <h3>DSTV </h3>
                                <p>Click buy now if you want to buy a DSTV package</p>
                            </div>
                            <div class="buy-btn">
                                <a href="{{url('get_tv_variations/dstv')}}" class="btn btn-primary  float-right">See packages</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box row" >
                        <div class="col-md-4">
                            <img class="airtime-image" src="{{asset('public/main/img/gotv.jpg')}}" alt="image">
                        </div>
                        <div class="col-md-8">
                            <div class="pricing-header">
                                <h3>GOTV </h3>
                                <p>Click buy now if you want to buy a GOTV package</p>
                            </div>
                            <div class="buy-btn">
                                <a href="{{url('get_tv_variations/gotv')}}" class="btn btn-primary  float-right">See packages</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box row" >
                        <div class="col-md-4">
                            <img class="airtime-image" src="{{asset('public/main/img/startime.jpg')}}" alt="image">
                        </div>
                        <div class="col-md-8">
                            <div class="pricing-header">
                                <h3>Startimes </h3>
                                <p>Click buy now if you want a startimes package</p>
                            </div>
                            <div class="buy-btn">
                                <a href="{{url('get_tv_variations/startimes')}}" class="btn btn-primary  float-right">See packages</a>
                            </div>
                        </div>
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