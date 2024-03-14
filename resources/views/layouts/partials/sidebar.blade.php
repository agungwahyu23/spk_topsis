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
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
            aria-controls="ui-basic">
            <span class="menu-title">Master</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('criterias.index') }}">Kriteria</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('subCriterias.index') }}">Sub Kriteria</a>
                </li>
            </ul>
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{ route('objeks.index') }}">Objek Wisata</a>
                </li>
            </ul>
        </div>
    </li>

    <li class="nav-item sidebar-actions">
        <span class="nav-link">
            <div class="border-bottom">
                <p class="text-secondary">TOPSIS</p>
            </div>
        </span>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('alternatives.index') }}">
            <span class="menu-title">Alternatif</span>
            <i class="mdi mdi-view-module menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('analyses.index') }}">
            <span class="menu-title">Penilaian</span>
            <i class="mdi mdi-clipboard-text menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <span class="menu-title">Perhitungan</span>
            <i class="mdi mdi-calculator menu-icon"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <span class="menu-title">Hasil Akhir</span>
            <i class="mdi mdi-briefcase-check menu-icon"></i>
        </a>
    </li>
    
</ul>