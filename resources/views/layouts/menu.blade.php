<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('criterias.index') }}" class="nav-link {{ Request::is('criterias*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Criterias</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('objeks.index') }}" class="nav-link {{ Request::is('objeks*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Objeks</p>
    </a>
</li>
