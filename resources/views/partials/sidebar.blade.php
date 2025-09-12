<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <!-- Logo -->
            <a class="fw-semibold text-white tracking-wide" href="index.html">
                <span class="smini-visible">
                    G<span class="opacity-75">O</span>
                </span>
                <span class="smini-hidden">
                    G<span class="opacity-75">-Scores</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Toggle Sidebar Style -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <!-- Class Toggle, functionality initialized in Helpers.dmToggleClass() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
                    <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                </button>
                <!-- END Toggle Sidebar Style -->

                <!-- Dark Mode -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#dark-mode-toggler" data-class="far fa" onclick="Dashmix.layout('dark_mode_toggle');">
                    <i class="far fa-moon" id="dark-mode-toggler"></i>
                </button>
                <!-- END Dark Mode -->

                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Request::is('dashboard') || Request::is('/') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="nav-main-link-icon fa fa-location-arrow"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::is('scores') ? 'active' : '' }}" href="{{ route('scores') }}">
                        <i class="nav-main-link-icon fa fa-magnifying-glass"></i>
                        <span class="nav-main-link-name">Search Scores</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::is('reports') ? 'active' : '' }}" href="{{ route('reports') }}">
                        <i class="nav-main-link-icon fa fa-sticky-note"></i>
                        <span class="nav-main-link-name">Reports</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link {{ Route::is('settings') ? 'active' : '' }}" href="{{ route('settings') }}">
                        <i class="nav-main-link-icon fa fa-cog"></i>
                        <span class="nav-main-link-name">Settings</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>