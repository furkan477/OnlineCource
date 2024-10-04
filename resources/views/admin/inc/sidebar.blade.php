<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home')}}" class="brand-link">
        &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span
            class="brand-text font-weight-light">Online Kurs Platformu</span>
    </a>

    <div class="sidebar">
        <div class="form-inline mt-2">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.user.list')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kullanıcı İşlemleri
                            <span class="right badge badge-success">user</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.cource.list')}}" class="nav-link">
                        <i class="fa-solid fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            Kurs İşlemleri
                            <span class="right badge badge-success">cource</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.lesson.list')}}" class="nav-link">
                        <i class="fa-brands fa-stack-overflow"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            Ders İşlemleri
                            <span class="right badge badge-success">lesson</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.exam.list')}}" class="nav-link">
                        <i class="fa-regular fa-clipboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            Sınav İşlemleri
                            <span class="right badge badge-success">exam</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.question.list')}}" class="nav-link">
                        <i class="fa-solid fa-question"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            Soru & Cevaplar
                            <span class="right badge badge-success">ques&cho</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.certifica.list')}}" class="nav-link">
                        <i class="fa-solid fa-stamp"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>
                            Sonuc & Belge
                            <span class="right badge badge-success">end&certf</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.card.list')}}" class="nav-link">
                        <i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;
                        <p>
                            Sepet İşlemleri
                            <span class="right badge badge-success">card</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.enrollment.list')}}" class="nav-link">
                        <i class="fa-solid fa-credit-card"></i>&nbsp;&nbsp;
                        <p>
                            Satın Alma İşlemleri
                            <span class="right badge badge-success">price</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact.list')}}" class="nav-link">
                        <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;
                        <p>
                            Mesaj İşlemleri
                            <span class="right badge badge-success">message</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-layer-group"></i>
                        <p>
                            Kategori İşlemleri
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.category.list')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listele</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.show')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yeni Ekle</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>