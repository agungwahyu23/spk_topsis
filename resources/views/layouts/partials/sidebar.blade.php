<ul class="nav">
    <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
            <div class="nav-profile-image">
                <img src="{{ asset('images/faces/face1.jpg') }}" alt="profile">
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
            </div>
            <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">David Grey. H</span>
                <span class="text-secondary text-small">Project Manager</span>
            </div>
            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('banks.index') }}">
            <span class="menu-title">Bank</span>
            <i class="mdi mdi-cash menu-icon"></i>
        </a>
    </li>

    @role('superadmin|admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('documentTypes.index') }}">
            <span class="menu-title">Tipe Dokumen</span>
            <i class="mdi mdi-file-document-edit menu-icon"></i></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('contacts.index') }}">
            <span class="menu-title">Kotak Masuk</span>
            <i class="mdi mdi-inbox-arrow-down menu-icon"></i></a>
    </li>
    @endrole

    <li class="nav-item">
        <a class="nav-link" href="{{ route('userDocuments.index') }}">
            <span class="menu-title">Dokumen Pengguna</span>
            <i class="mdi mdi-folder-account menu-icon"></i></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <span class="menu-title">Order</span>
            <i class="mdi mdi-cart menu-icon"></i></a>
    </li>

    @role('superadmin|admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('offerings.index') }}">
            <span class="menu-title">Penawaran</span>
            <i class="mdi mdi-wallet-giftcard menu-icon"></i></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('testimonis.index') }}">
            <span class="menu-title">Testimoni</span>
            <i class="mdi mdi-sticker-emoji menu-icon"></i></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
            aria-controls="ui-basic">
            <span class="menu-title">Pengguna</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('mitra') }}">Pelanggan</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('driver') }}">Driver</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reports" aria-expanded="false"
            aria-controls="reports">
            <span class="menu-title">Laporan</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="reports">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ url('reports/users') }}">Rekap Customer</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ url('reports/reposrt_orders') }}">Rekap Order</a>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false"
            aria-controls="settings">
            <span class="menu-title">Pengaturan</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="settings">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('settingPrices.index') }}">Harga</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('settings.index') }}">Website</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ url('cms/content') }}">Konten</a>
                </li>
            </ul>
        </div>
    </li>
    @endrole
    
</ul>