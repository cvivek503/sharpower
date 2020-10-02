<!doctype html>
<html lang=zxx>
   <!-- Mirrored from templates.envytheme.com/luvion/default/"{{url('/')}}" by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Jan 2020 18:44:22 GMT -->
   <head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('customers.includes.head')
    <title>SharpPower Easy Online Electricity Rechage in Nigeria | FAQs</title>
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
                <h2>Transactions</h2>
                <p>Your tansactions here.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

     <!-- Start FAQ Area -->
     <section class="faq-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="faq-content">
                        <div class="comments-area">
                            <h3 class="comments-title">Transactions</h3>
                            <ol class="comment-list">
                                @foreach ($transactions as $key=>$transaction)
                                <li class="comment">
                                    <article class="comment-body">
                                        <footer class="comment-meta">
                                            <div class="comment-author vcard">
                                                <b class="fn">N{{number_format($transaction->amount)}} <span class="float-right" style="color: #6084a4;font-size: 12px">#{{$transaction->trn_ref}}</span></b>
                                            </div>
                                            <div class="comment-metadata">
                                                <a href="#">
                                                    <time>{{$transaction->created_at}}</time>
                                                </a>
                                            </div>
                                        </footer>
                                        <div class="comment-content">
                                            <p>{{$transaction->description}}</p>
                                        </div>
                                        <div class="reply">
                                            @if($transaction->type == "Credit")
                                            <a href="#" class="comment-reply-link green">{{$transaction->type}}</a>
                                            @elseif($transaction->type == "Debit")
                                            <a href="#" class="comment-reply-link red">{{$transaction->type}}</a>
                                            @endif
                                        </div>
                                    </article>
                                </li>
                                @endforeach
                            </ol>
                            <div class="pagination-area">{{ $transactions->links() }}</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="{{url('customers/profile')}}">
                                    <i class="fas fa-user"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="accordion-item">
                                <a class="accordion-title " href="{{url('customers/transactions')}}">
                                    <i class="fas fa-credit-card my-active" ></i>
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