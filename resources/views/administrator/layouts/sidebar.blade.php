<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a
                href="/">{{ array_key_exists('nama_app_admin', $settings) ? $settings['nama_app_admin'] : '' }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
                <?php
                $namaText = array_key_exists('nama_app_admin', $settings) ? $settings['nama_app_admin'] : '';
                $twoInitialChars = strtoupper(substr($namaText, 0, 2));
                echo $twoInitialChars;
                ?>
            </a>
        </div>
        @php
            $permissions = getPermissionModuleGroup();
        @endphp
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Route::is('admin.dashboard*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.dashboard')}}"><i class="fas fa-columns"></i><span>Dashboard</span></a></li>
            <li class="menu-header">Menu</li>
            <li class="dropdown {{ Route::is('admin.service*', 'admin.about*', 'admin.banner*', 'admin.contact*', 'admin.our_feature*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.banner*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.banner')}}">Banner</a></li>
                    <li class="{{ Route::is('admin.service*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.service')}}">Service</a></li>
                    <li class="{{ Route::is('admin.about*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.about')}}">About</a></li>
                    <li class="{{ Route::is('admin.our_feature*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.our_feature')}}">Our Feature</a></li>
                    <li class="{{ Route::is('admin.contact*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.contact')}}">Contact</a></li>
                    <li class="{{ Route::is('admin.free_qoute*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.free_qoute')}}">Free Qoute</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Route::is('admin.blog*', 'admin.kategori_blog*', 'admin.komentar_blog*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-newspaper"></i>
                    <span>Blog</span></a>
                    <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.blog*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.blog')}}">Post</a></li>
                    <li class="{{ Route::is('admin.kategori_blog*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.kategori_blog')}}">Kategori Blog</a></li>
                    <li class="{{ Route::is('admin.komentar_blog*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.komentar_blog')}}">Komentar</a></li>
                </ul>
            </li>
            <li class="{{ Route::is('admin.gallery*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.gallery')}}"><i class="fas fa-images"></i> <span>Gallery</span></a></li>
            <li class="{{ Route::is('admin.client*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.client')}}"><i class="fas fa-money-bill-wave"></i> <span>Client</span></a></li>
            <li class="{{ Route::is('admin.team*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.team')}}"><i class="fas fa-money-bill-wave"></i> <span>Team</span></a></li>
            <li class="{{ Route::is('admin.testimonial*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.testimonial')}}"><i class="fas fa-money-bill-wave"></i> <span>Testimonial</span></a></li>
            <li class="dropdown {{ Route::is('admin.users*','admin.user_groups*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i>
                    <span>User Management</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.user_groups*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.user_groups')}}">User Group</a></li>
                    <li class="{{ Route::is('admin.users*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.users')}}">User</a></li>
                </ul>
            </li>
            @if (showModule('log_systems', $permissions) || showModule('statistic', $permissions))
                <li class="dropdown {{ Route::is('admin.logSystems*','admin.statistic*') ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                            class="fas fa-bezier-curve"></i>
                        <span>Systems</span></a>
                    <ul class="dropdown-menu">
                        @if (showModule('log_systems', $permissions))
                            <li class="{{ Route::is('admin.logSystems*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('admin.logSystems') }}">Logs</a></li>
                        @endif
                        @if (showModule('statistic', $permissions))
                            <li class="{{ Route::is('admin.statistic*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('admin.statistic') }}">Statistic</a></li>
                        @endif
                    </ul>
                </li>
            @endif
            <li class="{{ Route::is('admin.profile*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.profile',(auth()->user() ? auth()->user()->kode : ""))}}"><i class="fas fa-solid fa-user"></i> <span>Profile</span></a></li>
            <li class="dropdown {{ Route::is('admin.settings*','admin.module*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>Settings</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Route::is('admin.settings*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.settings')}}">Menu Settings</a></li>
                    <li class="{{ Route::is('admin.module*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.module')}}">Module Management</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
