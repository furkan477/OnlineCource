<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form action="" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" class="form-control border-0" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="{{route('home')}}" class="js-logo-clone">Online Kurs</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <li><a href="{{route('profile',Auth::id())}}"><span class="icon icon-person"></span></a></li>
                            <li>
                                <a href="{{route('cart',Auth::id())}}" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>
                                    <span class="count">{{count(Auth::user()->carts)}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                @if (Auth::user())
                    <li><a href="{{route('home')}}">Ana Sayfa</a></li>
                    <li><a href="{{route('about')}}">Hakkımızda</a></li>
                    <li><a href="{{route('cource.d')}}">Kurslar</a></li>
                    @if(Auth::user()->role == 'stu' || Auth::user()->role == 'adm')
                        <li><a href="{{route('stu.cource.list',parameters: Auth::id())}}">Devam Eden Kurslarım</a></li>
                    @endif
                    @if(Auth::user()->role == 'tch' || Auth::user()->role == 'adm')
                        <li><a href="{{route('cource.show')}}">Kurs Eğitimi Oluştur</a></li>
                        <li><a href="{{route('cource.list',Auth::id())}}">Kurs Eğitimlerim</a></li>
                    @endif
                    <li><a href="{{route('user.summary',Auth::id())}}">Beni Özetle</a></li>
                    <li><a href="{{route('contact')}}">İletişim</a></li>
                    <li><a href="{{route('logout')}}">Çıkış Yap</a></li>
                    @if(Auth::user()->role == 'adm')
                        <li><a href="{{route('admin.admin')}}">Admin Ol</a></li>
                    @endif
                @endif
            </ul>
        </div>
    </nav>
</header>