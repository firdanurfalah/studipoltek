<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{Auth::user()->level == 'user' ? '/':'/home'}}" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Snapguide</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" hidden>
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/home" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- Admin dan Owner --}}
                @if(Auth::user()->level == 'admin' || Auth::user()->level == 'owner')
                {{-- Dashboard --}}
                <li class="nav-item" hidden>
                    <a href="/home" class="nav-link {{Request::is('home') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- Admin --}}
                <li class="nav-item">
                    <a href="/adminxxx" class="nav-link {{Request::is('adminxxx') ? 'active' : ''}}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Admin
                        </p>
                    </a>
                </li>
                @if(Auth::user()->level == 'admin')
                {{-- Kategori --}}
                <li class="nav-item">
                    <a href="/categori" class="nav-link {{Request::is('categori') ? 'active' : ''}}">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Kategori
                        </p>
                    </a>
                </li>
                {{-- Artikel --}}
                <li class="nav-item" hidden>
                    <a href="/artikel" class="nav-link {{Request::is('artikel') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Artikel
                        </p>
                    </a>
                </li>
                {{-- Produk --}}
                <li class="nav-item">
                    <a href="/product" class="nav-link {{Request::is('product') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            Produk
                        </p>
                    </a>
                </li>
                {{-- Promo --}}
                <li class="nav-item">
                    <a href="/admin-promo" class="nav-link {{Request::is('admin-promo') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-percent"></i>
                        <p>
                            Promo
                        </p>
                    </a>
                </li>
                {{-- Referensi --}}
                <li class="nav-item">
                    <a href="/admin-referensi" class="nav-link {{Request::is('admin-referensi') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Referensi
                        </p>
                    </a>
                </li>
                @endif
                {{-- Booking --}}
                <li class="nav-item">
                    <a href="/booking" class="nav-link {{Request::is('booking') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-plus"></i>
                        <p>
                            Booking
                        </p>
                    </a>
                </li>
                @else
                {{-- Profile --}}
                <li class="nav-item">
                    <a href="/profile" class="nav-link {{Request::is('profile') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                {{-- History Booking --}}
                <li class="nav-item">
                    <a href="/history-booking" class="nav-link {{Request::is('history-booking') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            history-booking
                        </p>
                    </a>
                </li>
                {{-- FAQ --}}
                <li class="nav-item">
                    <a href="https://drive.google.com/file/d/1zLP5i7FcnWHX2n1xgYu7i1phRLCkE2vC/view?usp=drive_link"
                        class="nav-link ">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Help
                        </p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>