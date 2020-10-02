<!doctype html>
<html lang=zxx>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:22 GMT -->
   <head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customers.includes.head')
    <title>SharpPower Easy Online Electricity Rechage in Nigeria | Buy Electricity</title>
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
                <h2>Buy Electricity</h2>
                <p>Buying electricity in Nigeria can't be faster.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="pricing-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box" style="min-height: 258px">
                        <div class="pricing-header">
                            <h3>Ikeja Electricity Distribution Company </h3>
                            <p>Click buy now if you fall under (IKEDC)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("ikeja-electric", "Ikeja Electricity Distribution Company  (IKEDC)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Lagos mainland</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box" style="min-height: 258px">
                        <div class="pricing-header">
                            <h3>Eko Electricity Distribution Company </h3>
                            <p>Click buy now if you fall under (EKEDC)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("eko-electric", "Eko Electricity Distribution Company (EKEDC)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Lagos island</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Kano Electricity Distribution Company </h3>
                            <p>Click buy now if you fall under (KEDCO)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("kano-electric", "Kano Electricity Distribution Company (KEDCO)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Kano</li>
                            <li><i class="fas fa-check"></i> Katsina </li>
                            <li><i class="fas fa-check"></i> Jigawa.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Port Harcourt Electricity Distribution Company </h3>
                            <p>Click buy now if you fall under (PHED)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("portharcourt-electric", "Port Harcourt Electricity Distribution Company (PHED)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Rivers</li>
                            <li><i class="fas fa-check"></i> Bayelsa </li>
                            <li><i class="fas fa-check"></i> Cross river</li>
                            <li><i class="fas fa-check"></i> Akwa ibom</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Jos Electricity Distribution Company </h3>
                            <p>Click buy now if you fall under (JED)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("jos-electric", "Jos Electricity Distribution Company (JED)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Bauchi</li>
                            <li><i class="fas fa-check"></i> Benue </li>
                            <li><i class="fas fa-check"></i> Gombe</li>
                            <li><i class="fas fa-check"></i> Plateau</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Ibadan Electricity Distribution Company</h3>
                            <p>Click buy now if you fall under (IBED)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("ibadan-electric", "Ibadan Electricity Distribution Company (IBED)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Oyo</li>
                            <li><i class="fas fa-check"></i> Ogun </li>
                            <li><i class="fas fa-check"></i> Osun</li>
                            <li><i class="fas fa-check"></i> Kwara & parts of Niger, Ekiti & Kogi</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Kaduna Electricity Distribution Company</h3>
                            <p>Click buy now if you fall under (KAEDCO)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("kaduna-electric", "Kaduna Electricity Distribution Company (KAEDCO)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> Kaduna</li>
                            <li><i class="fas fa-check"></i> Kebbi </li>
                            <li><i class="fas fa-check"></i> Sokoto</li>
                            <li><i class="fas fa-check"></i> Zamfara</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box">
                        <div class="pricing-header">
                            <h3>Abuja Electricity Distribution Company</h3>
                            <p>Click buy now if you fall under (AEDC)</p>
                        </div>

                        <div class="buy-btn">
                            <a href="javascript:void(0)" onclick='openModal("abuja-electric", "Abuja Electricity Distribution Company(AEDC)")' class="btn btn-primary  float-right">Buy now</a>
                        </div>

                        <ul class="pricing-features">
                            <li><i class="fas fa-check"></i> FCT Abuja</li>
                            <li><i class="fas fa-check"></i> Kogi </li>
                            <li><i class="fas fa-check"></i> Niger</li>
                            <li><i class="fas fa-check"></i> Nassarawa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
      
      
      @include('customers.includes.footer')
      <div class=go-top><i class="fas fa-arrow-up"></i></div>
      @include('customers.includes.script')

      <script>
        function openModal(disco, disco_name){
            $("#disco").val(disco);
            $("#disco_name").html(disco_name);
            $("#verify").modal("toggle");
        }
    
    </script>

    <div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body contact-form">
                    <p id="disco_name"></p>
                    <form class="form-horizontal m-t-30" id="contact-form" method="POST" action="{{url('customers/verify_meter')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="disco" id="disco" />
                        <div class="form-group">
                            <div class="col-12">
                                <label>Meter number</label>
                                <input class="form-control" type="number" id="meter_number" name="meter_number" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label>Amount(N)</label>
                                <input class="form-control" type="number" id="price" name="price" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label>Meter type</label>
                                <select class="form-control" type="type" id="type" name="type" required >
                                    <option value="prepaid">Prepaid</option>
                                    <option value="postpaid">Postpaid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Verify</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:23 GMT -->
</html>