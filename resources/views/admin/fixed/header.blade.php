<div id="headerAdmin">
        <div id="headerContainer">
            <div id="logo">
                <a target="_self" rel="follow" href="{{url('/')}}"><img src="{{asset('images/logo3.webp')}}" alt="logo" /></a>
            </div>
            <div id="headerNav">
                <div id="hamburger">
                    <div class="hamburger "></div>
                    <div class="hamburger "></div>
                    <div class="hamburger "></div>
                </div>

                <ul id="headerLinks" class="topnav">
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('/')}}">POČETNA</a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('/usluge')}}">USLUGE</a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="https://bazzar.rs/store/impression">PROIZVODI</a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('/paketi')}}">PAKETI</a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('/galerija')}}">GALERIJA</a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('kontakt')}}">KONTAKT</a></li>
                    <li class="active"><a target="_self" rel="follow" class="cool-link" href="{{url('/admin')}}">{{ substr(session()->get("user")->name, 0, 1); }}. {{ substr(session()->get("user")->lastName, 0, 1); }}. <i class="fa fa-user-circle"></i></a></li>
                    <li><a target="_self" rel="follow" class="cool-link" href="{{url('/odjava')}}"><i class="fa fa-sign-out"></i></a></li>
                    {{-- <li><a href="facebook.com"><i class="fa fa-facebook-official"></i></a><a href="instagram.com"><i class="fa fa-instagram"></i></a></li> --}}
                </ul>

                <div id="myNav" class="overlayBox">
                    <a target="_self" rel="follow" class="closebtn">&times;</a>
                    <div class="overlay-content">
                        <ul id="hiddenUl">
                            <li {{ request()->is('/') ? 'class=active' : '' }} ><a target="_self" rel="follow" class="cool-link" href="{{url('/')}}">Početna</a></li>
                            <li {{ request()->is('usluge') ? 'class=active' : '' }}><a target="_self" rel="follow" class="cool-link" href="{{url('/usluge')}}">Usluge</a></li>
                            <li {{ request()->is('projekti') ? 'class=active' : '' }}><a target="_blank" rel="noopener" class="cool-link" href="https://bazzar.rs/store/impression">Proizvodi</a></li>
                            <li {{ request()->is('paketi') ? 'class=active' : '' }}><a target="_self" rel="follow" class="cool-link" href="{{url('/paketi')}}">Paketi</a></li>
                            <li {{ request()->is('galerija') ? 'class=active' : '' }}><a target="_self" rel="follow" class="cool-link" href="{{url('/galerija')}}">Galerija</a></li>
                            <li {{ request()->is('kontakt') ? 'class=active' : '' }}><a target="_self" rel="follow" class="cool-link" href="{{url('/kontakt')}}">Kontakt</a></li>
                            @if(!session()->has('user'))
                            <li {{ request()->is('prijava') ? 'class=active' : '' }}><a class="cool-link" href="{{url('/prijava')}}">Prijava</a></li>
                            @else
                            <li>
                                <a target="_self" rel="follow" class="cool-link " href="{{url('/admin')}}">{{ substr(session()->get("user")->name, 0, 1); }}. {{ substr(session()->get("user")->lastName, 0, 1); }}. <i class="fa fa-user-circle"></i></a>
                            </li>
                            <li>
                                <a target="_self" rel="follow" class="cool-link" href="{{url('/odjava')}}">Odjava</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

</div>
