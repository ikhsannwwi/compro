<nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="{{ route('web.index') }}" class="navbar-brand p-0">
        <h1 class="m-0">{{array_key_exists('general_nama_app', $settings) ? ($settings['general_nama_app'] ? $settings['general_nama_app'] : 'Compro') : 'Compro'}}</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('web.index') }}"
                class="nav-item nav-link {{ Route::is('web.index*') ? 'active' : '' }}">Home</a>
            <a href="{{ route('web.about') }}"
                class="nav-item nav-link {{ Route::is('web.about*') ? 'active' : '' }}">About</a>
            <a href="{{ route('web.service') }}"
                class="nav-item nav-link {{ Route::is('web.service*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('web.blog') }}"
                class="nav-item nav-link {{ Route::is('web.blog*') ? 'active' : '' }}">Blog</a>
            <div class="nav-item dropdown">
                <a href="#"
                    class="nav-link dropdown-toggle {{ Route::is('web.our_feature*', 'web.team*', 'web.testimonial*', 'web.free_qoute*') ? 'active' : '' }}"
                    data-bs-toggle="dropdown">Other</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('web.our_feature') }}"
                        class="dropdown-item {{ Route::is('web.our_feature*') ? 'active' : '' }}">Our features</a>
                    <a href="{{ route('web.team') }}"
                        class="dropdown-item {{ Route::is('web.team*') ? 'active' : '' }}">Team Members</a>
                    <a href="{{ route('web.testimonial') }}"
                        class="dropdown-item {{ Route::is('web.testimonial*') ? 'active' : '' }}">Testimonial</a>
                    <a href="{{ route('web.free_qoute') }}"
                        class="dropdown-item {{ Route::is('web.free_qoute*') ? 'active' : '' }}">Free Quote</a>
                </div>
            </div>
            <a href="{{ route('web.contact') }}"
                class="nav-item nav-link {{ Route::is('web.contact*') ? 'active' : '' }}">Contact</a>
        </div>
        <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i
                class="fa fa-search"></i></butaton>
        <a href="{{ route('admin.login') }}" class="btn btn-primary py-2 px-4 ms-3">Login</a>
    </div>
</nav>
