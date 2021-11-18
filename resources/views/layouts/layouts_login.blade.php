<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.header_scripts')
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            @include('layouts.partials.auth_header_logo')
                        </div>

                        @yield('sections')

                    </div>
                </div>
            </div>

        </section>
    </div>

    @include('layouts.partials.footer_scripts')

</body>

</html>
