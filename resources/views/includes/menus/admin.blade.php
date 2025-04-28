<li class="nav-item" {{ Route::currentRouteName() === 'admin.index' ? 'active' : '' }}>
    <a class="nav-link" href="{{ route('home') }}">
      <svg class="nav-icon">
        <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
      </svg> Dashboard
      <span class="badge badge-sm bg-info ms-auto">NEW</span>
    </a>
  </li>

  <li class="nav-title">Ringtone Management</li>

  <li class="nav-item" {{ request()->routeIs('ringtones.index') ? 'active' : '' }}>
    <a class="nav-link" href="{{ route('ringtones.index') }}">
      <svg class="nav-icon">
        <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-music-note') }}"></use>
      </svg> All Ringtones
    </a>
  </li>

  <li class="nav-item" {{ request()->routeIs('ringtones.create') ? 'active' : '' }}>
    <a class="nav-link" href="{{ route('ringtones.create') }}">
      <svg class="nav-icon">
        <use xlink:href="{{ asset('coreUi/vendors/@coreui/icons/svg/free.svg#cil-plus') }}"></use>
      </svg> Add New Ringtone
    </a>
  </li>
