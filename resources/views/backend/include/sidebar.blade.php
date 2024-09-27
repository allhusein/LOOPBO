 <!-- ========== Left Sidebar Start ========== -->
 <div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <!--<a href="index.html" class="logo"><i class="mdi mdi-assistant"></i> Urora</a>-->
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets_backend/images/logo-dashboard.png') }}" alt="logo-loop" class="logo-large">
            </a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft" id="sidebar-main">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('home') }}" class="waves-effect" id="/">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @hasrole('superadmin|dosen')
                <li>
                    <a href="{{route('user.index')}}" class="waves-effect" id="/user">
                        <i class="mdi mdi-account"></i>
                        <span> User Manajemen </span>
                    </a>
                </li>
                @endhasrole

                @hasrole('mahasiswa|dosen')
                <li class="has_sub">
                                <a class="waves-effect"><i class="mdi mdi-animation"></i> <span> Latihan Materi </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{route('category.index')}}">Kategori</a></li>
                                </ul>
                            </li>

                @endhasrole
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->

@push('after-script')
<script>
    const url = window.location.pathname.split(("/"));
    const getSide = document.getElementById("/"+url[2]);
    getSide.classList.add('active');
</script>
@endpush
