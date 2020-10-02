<ul class=navbar-nav>
    <li class=nav-item>
       <a href="{{url('/')}}" @if(Request::segment(1) == "") class="nav-link active" @endif class="nav-link">Home </a> 
    </li>
    <li class=nav-item><a href="{{url('about')}}" @if(Request::segment(1) == "about") class="nav-link active" @endif class=nav-link>About Us </a></li>
    <li class=nav-item><a href="{{url('contact')}}" @if(Request::segment(1) == "contact") class="nav-link active" @endif class=nav-link>Contact</a></li>
 </ul>
 <div class=others-options> @if(Auth::user()) <a href="{{url('customers/profile')}}" class=login-btn> My account, </a> <a href="{{url('logout')}}" class=login-btn> Logout</a> @else<a href="{{url('login')}}" class=login-btn><i class=flaticon-user></i> Log In</a>@endif </div>