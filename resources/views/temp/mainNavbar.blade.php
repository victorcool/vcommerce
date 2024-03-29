<div class="w3_navigation" style="background:#FFF;">    
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header navbar-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <h1><a class="navbar-brand" href="{{url('/')}}">
                <img src="{{asset('uploads/healmassLogo.png')}}" class="img-fluid" style="width:4em; line-height:0%;" alt="logo">    
                </a></h1>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <nav class="menu menu--iris" style="background:#00F327;">
                    <ul class="nav navbar-nav menu__list">
                    <li class="menu__item menu__item--current"><a href="{{url('/')}}" class="menu__link">Home</a></li>
                        <li class="menu__item"><a href="{{url('/products')}}" class="menu__link">Our products</a></li>
                        <li class="menu__item"><a href="{{url('/services')}}" class="menu__link">Our services</a></li>
                        <li class="menu__item"><a href="{{url('/market')}}" class="menu__link">Market</a></li>
                        {{-- <li class="menu__item"><a href="{{url('/about')}}" class="menu__link">About us</a></li>                         --}}
                        <li class="dropdown menu__item">
                            <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">About us<b class="caret"></b></a>
                            <ul class="dropdown-menu agile_short_dropdown">						
                                <li><a href="{{url('/introduction')}}">Introduction</a></li>
                                <li><a href="{{url('/history')}}">History & Strategy</a></li>
                            </ul>
                        </li>
                        <li class="menu__item"><a href="{{url('/contact')}}" class="menu__link">Contact </a></li>
                    </ul>
                </nav>
            </div>
        </nav>

    </div>
</div>