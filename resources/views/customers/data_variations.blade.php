<!doctype html>
<html lang=zxx>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:22 GMT -->
   <head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customers.includes.head')
    <title>SharpPower Easy Online Electricity Rechage in Nigeria | Buy {{$variations->ServiceName}}</title>
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
    <script src="https://checkout.flutterwave.com/v3.js"></script>
   </head>
   <body>
        <!--
      <div class=preloader>
         <div class=loader>
            <div class=shadow></div>
            <div class=box></div>
         </div>
      </div>
        -->
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
                <h2>Buy {{$variations->ServiceName}}</h2>
                <p>Buying {{$variations->ServiceName}} in Nigeria can't be faster.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <section class="pricing-area ptb-70">
        <div class="container">
            <div class="row">
                @foreach ($variations->varations as $key=>$variation)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-pricing-box row" >
                        <div class="col-md-4">
                            @if($variations->ServiceName == "MTN Data")
                            <img class="airtime-image" src="{{asset('public/main/img/mtn.png')}}" alt="image">
                            @elseif($variations->ServiceName == "Airtel Data")
                            <img class="airtime-image" src="{{asset('public/main/img/airtel.png')}}" alt="image">
                            @elseif($variations->ServiceName == "GLO Data")
                            <img class="airtime-image" src="{{asset('public/main/img/glo.png')}}" alt="image">
                            @elseif($variations->ServiceName == "Etisalat Data")
                            <img class="airtime-image" src="{{asset('public/main/img/9mobile.png')}}" alt="image">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="pricing-header">
                                <h3>{{$variations->ServiceName}} </h3>
                                <p>{{$variation->name}}</p>
                            </div>
                            <div class="buy-btn">
                                <a href="javascript:void(0)" onclick='openModal("{{$variations->serviceID}}","{{$variation->variation_code}}","{{$variation->variation_amount}}")' class="btn btn-primary float-right">Recharge</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
      
      
      @include('customers.includes.footer')
      <div class=go-top><i class="fas fa-arrow-up"></i></div>
      @include('customers.includes.script')

      <script>
        function openModal(serviceID, variation_code, price){
            $("#serviceId").val(serviceID);
            $("#variation_code").val(variation_code);
            $("#price").val(price);
            $("#verify").modal("toggle");
            
        }
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
        function payWithWallet(){
            var d = new Date();
            var n = d.getTime();
            n = String(n).slice(n.length - 10);
            $("#trn_ref").val(n);
            $("#payment_method").val("Pay with wallet");
            document.getElementById("contact-form").submit();
        }
    
    </script>

    <div class="modal fade" id="verify" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body contact-form">
                    <p id="network_name"></p>
                    <form class="form-horizontal m-t-30" id="contact-form" method="POST" action="{{url('customers/execute_data_purchase')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="serviceID" id="serviceId"  />
                        <input type="hidden" name="variation_code" id="variation_code"  />
                        <input type="hidden" name="trn_ref" id="trn_ref"  />
                        <input type="hidden" name="payment_method" id="payment_method"  />
                        @if(Auth::user() == null)
                        <div class="form-group">
                            <div class="col-12">
                                <label>Email</label>
                                <input class="form-control" type="email"  id="email" name="email" required >
                            </div>
                        </div>
                        @else
                        <input type="hidden" value="{{Auth::user()->email}}" name="email"  id="email" />
                        @endif
                        <div class="form-group">
                            <div class="col-12">
                                <label>Amount</label>
                                <input class="form-control" type="number" readonly id="price" name="price" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label>Phone</label>
                                <input class="form-control" type="number" id="phone" name="phone" required >
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                @if(Auth::user()!=null)
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" onclick="payWithWallet()" type="button">Pay with wallet</button>
                                @endif
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" onclick="payWithCard1()" type="button">Pay with card</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--
    <form>
        <script>
            function payWithCard(){
                
                if(document.getElementById('price').value.length < 2){
                    alert('Kindly provide a valid amount');
                    return;
                }
                if(document.getElementById('phone').value.length < 11){
                    alert('Kindly provide a valid phone number');
                    return;
                }
                var d = new Date();
                var n = d.getTime();
                n = String(n).slice(n.length - 10);
                if(validateEmail(document.getElementById('email').value) != true){
                    alert("Sorry! Your email is not valid");
                    return;
                }
                $("#trn_ref").val(n);
                var handler = PaystackPop.setup({
                    key: "pk_test_b1f00843f8c3d01ee3c16317fc6d72c542e04157",
                    email: document.getElementById('email').value,
                    amount: document.getElementById('price').value * 100,
                    
                    ref: n,
                    
                    currency: "NGN",
                    metadata: {
                        custom_fields: [
                        { display_name: "Email Address", variable_name: "email_address", value: document.getElementById('email').value },
                        
                        ]
                    },
                    callback: function(response){
                        $("#payment_method").val("Pay with card");
                        document.getElementById("contact-form").submit();
                        
                    },
                    onClose: function(){
                        alert('Transaction Cancelled');
                        
                    }
                });
                handler.openIframe();
            }
        </script>
    </form>
-->


    <script>
        function payWithCard1() {
            if(document.getElementById('phone').value.length < 11){
                alert('Kindly provide a valid phone number');
                return;
            }
            if(document.getElementById('phone').value.length < 11){
                alert('Kindly provide a valid phone number');
                return;
            }
            var d = new Date();
            var n = d.getTime();
            n = String(n).slice(n.length - 10);
            if(validateEmail(document.getElementById('email').value) != true){
                alert("Sorry! Your email is not valid");
                return;
            }
            $("#trn_ref").val(n);
          FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-8466a52cc96979c1cc2326f1597e8517-X",
            tx_ref: n,
            amount: document.getElementById('price').value,
            currency: "NGN",
            country: "NG",
            payment_options: "card, mobilemoneynigeria, bank, credit, ussd",
            
            customer: {
              email: document.getElementById('email').value,
              phone_number: document.getElementById('phone').value,
            },
            callback: function (data) {
                if(data.status == "successful" || data.status == "completed"){
                    $("#payment_method").val("Pay with card");
                    document.getElementById("contact-form").submit();
                }
                
            },
            onclose: function() {
              // close modal
              alert('Transaction Cancelled');
            },
            customizations: {
              title: "Sharpower",
              description: "Payment for data",
              logo: "{{asset('public/main/img/black-logo.png')}}",
            },
          });
        }
      </script>
</body>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:23 GMT -->
</html>