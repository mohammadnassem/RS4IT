<div class="nav-content d-flex">
    <!-- Logo Start -->
    <div class="logo position-relative">
        <a href="/Dashboards/passenger">
            <!-- Logo can be added directly -->
            <!-- <img src="/img/logo/logo-white.svg" alt="logo" /> -->

            <!-- Or added via css to provide different ones for different color themes -->
            <div class="img"></div>
        </a>
    </div>
    <!-- Logo End -->




    <!-- Icons Menu Start -->
    <ul class="list-unstyled list-inline text-center menu-icons">
        <li class="list-inline-item">
            <a href="#" data-bs-toggle="modal" data-bs-target="#searchPagesModal">
                <i data-acorn-icon="search" data-acorn-size="18"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}">
                <i data-acorn-icon="logout" class="me-2" data-acorn-size="17"></i>
                <span class="align-middle">Logout</span>
            </a>
        </li>
        <li class="list-inline-item">
            <a href="#" id="colorButton">
                <i data-acorn-icon="light-on" class="light" data-acorn-size="18"></i>
                <i data-acorn-icon="light-off" class="dark" data-acorn-size="18"></i>
            </a>
        </li>

    </ul>
    <!-- Icons Menu End -->

    <!-- Menu Start -->
    <div class="menu-container flex-grow-1">
        <ul id="menu" class="menu">
            {{--            <li>--}}
            {{--                <a href="/Horizontal">--}}
            {{--                    <i data-acorn-icon="grid-2" class="icon" data-acorn-size="18"></i>--}}
            {{--                    <span class="label">Horizontal</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                <a href="/Vertical">--}}
            {{--                    <i data-acorn-icon="grid-3" class="icon" data-acorn-size="18"></i>--}}
            {{--                    <span class="label">Vertical</span>--}}
            {{--                </a>--}}
            {{--            </li>--}}
        </ul>
    </div>
    <!-- Menu End -->

    <!-- Mobile Buttons Start -->
    <div class="mobile-buttons-container">
        <!-- Scrollspy Mobile Button Start -->
        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
            <i data-acorn-icon="menu-dropdown"></i>
        </a>
        <!-- Scrollspy Mobile Button End -->

        <!-- Scrollspy Mobile Dropdown Start -->
        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
        <!-- Scrollspy Mobile Dropdown End -->

        <!-- Menu Button Start -->
        <a href="#" id="mobileMenuButton" class="menu-button">
            <i data-acorn-icon="menu"></i>
        </a>
        <!-- Menu Button End -->
    </div>
    <!-- Mobile Buttons End -->
</div>
<div class="nav-shadow"></div><?php
