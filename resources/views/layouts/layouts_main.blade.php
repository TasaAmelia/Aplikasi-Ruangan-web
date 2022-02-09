<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.header_scripts')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                        class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        @include('layouts.partials.navbar_notification')
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            @include('layouts.partials.navbar_user_activities')
                        </a>
                    </li>
                </ul>
            </nav>

            @include('layouts.partials.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield("container")

            </div>
        </div>
    </div>

    @include('layouts.partials.footer_scripts')

</body>

</html>
