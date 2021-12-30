<img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
@auth
<div class="d-sm-none d-lg-inline-block">Welcome, {{ auth()->user()->fullname }}</div></a>
<div class="dropdown-menu dropdown-menu-right">
    {{-- <a href="features-profile.html" class="dropdown-item has-icon">
        <i class="far fa-user"></i> Change Photo
    </a> --}}
    <a href="/changePass" class="dropdown-item has-icon">
        <i class="fas fa-bolt"></i> Change Password
    </a>
    {{-- <a href="features-settings.html" class="dropdown-item has-icon">
        <i class="fas fa-cog"></i> Reset Password
    </a> --}}
    <div class="dropdown-divider"></div>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"> Logout</i>
        </button>
    </form>
</div>
@endauth
