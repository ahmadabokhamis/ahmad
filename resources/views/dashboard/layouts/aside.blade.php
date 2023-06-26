<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="" class="app-brand-link">
            <span class="app-brand-logo demo">

           {{-- <i class="fa-solid fa-dove" style="color: #4277c7;"></i> --}}
           <i class="fa-solid fa-cart-shopping fa-2xl" style="color: #4277c7;"></i>
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Moma</span>
        </a>


        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->


        <li class="menu-item
        ">

            <a href="{{ route('admin.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>

        </li>

        <li class="menu-item

        {{ request()->route()->named('admin.categories')? 'active open': '' }}
        {{ request()->route()->named('admin.products')? 'active open': '' }}
            ">


        <a href="" class="menu-link menu-toggle">

            <i class='menu-icon tf-icons bx bxs-car'></i>
            <div data-i18n="Misc">
                catalog</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ request()->route()->named('admin.categories')? 'active': '' }}">
                <a href="{{ route('admin.categories') }}" class="menu-link ">
                    <div data-i18n="Error">Categories</div>
                </a>
            </li>
            <li class="menu-item {{ request()->route()->named('admin.products')? 'active': '' }}">
                <a href="{{ route('admin.products') }}" class="menu-link ">
                    <div data-i18n="Basic">products</div>
                </a>
            </li>
        </ul>

        </li>
        <li class="menu-item

        {{ request()->route()->named('admin.companies')? 'active open': '' }}

            ">

            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">companies</div>
            </a>


            <ul class="menu-sub ">


                 <li class="menu-item  {{ request()->route()->named('admin.companies')? 'active': '' }}">
                    <a href="{{ route('admin.companies') }}" class="menu-link">
                        <div data-i18n="Services">view companies </div>
                    </a>
                </li>





            </ul>

        </li>



        <li class="menu-item



        {{ request()->route()->named('admin.customers')? 'active open': '' }}




        ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">

                <i class='menu-icon tf-icons bx bx-user'></i>
                <div data-i18n="Authentications">customers</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{ request()->route()->named('admin.customers')? 'active': '' }}">
                    <a href="{{ route('admin.customers') }}" class="menu-link">
                        <div data-i18n="Basic">customers</div>
                    </a>
                </li>

            </ul>
        </li>



        <li class="menu-item

        {{ request()->route()->named('admin.orders')? 'active open': '' }}


        ">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Sales</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->route()->named('admin.orders')? 'active': '' }}">
                    <a href="{{ route('admin.orders') }}" class="menu-link">
                        <div data-i18n="Accordion">Orders</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item

        {{ request()->route()->named('admin.advertisement')? 'active open': '' }}


        ">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">advertisement</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->route()->named('admin.advertisement')? 'active': '' }}">
                    <a href="{{ route('admin.advertisement') }}" class="menu-link">
                        <div data-i18n="Accordion">advertisement</div>
                    </a>
                </li>

            </ul>
        </li>


        <li class="menu-item



        ">
            <a href="javascript:void(0)" class="menu-link menu-toggle">

                <i class='menu-icon tf-icons bx bxs-report' ></i>
                <div data-i18n="User interface">Reports</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="" class="menu-link">
                        <div data-i18n="Accordion">Reports</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link">
                        <div data-i18n="Accordion">Statistics</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item

        {{ request()->route()->named('admin.users.index')? 'active open': '' }}
        {{ request()->route()->named('admin.roles.index')? 'active open': '' }}



        ">
            <a href="javascript:void(0)" class="menu-link menu-toggle">

                <i class='menu-icon tf-icons   bx bx-cog'></i>
                <div data-i18n="User interface">System</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->route()->named('admin.users.index')? 'active ': '' }}">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <div data-i18n="Accordion">Users</div>
                    </a>
                </li>
                <li class="menu-item
                {{ request()->route()->named('admin.roles.index')? 'active ': '' }}
                ">
                    <a href="{{ route('admin.roles.index') }}" class="menu-link">
                        <div data-i18n="Accordion">User Permission</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item">
            <div class="menu-link ">
                <a href="{{ route('admin.logout') }}" class="btn btn-sm btn-outline-danger" style="margin: auto"><i
                        class="bx bx-log-out-circle"></i> logout</a>
            </div>
        </li>
    </ul>

</aside>
<script src="{{ URL::asset('dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ URL::asset('dashboard/assets/js/config.js') }}"></script>


        <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ URL::asset('dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ URL::asset('dashboard/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ URL::asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ URL::asset('dashboard/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ URL::asset('dashboard/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->

    <script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Chart JS -->
