<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= base_url(); ?>assets/admin/images/logo-dark-sm.png" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url(); ?>assets/admin/images/logo-dark.png" alt="" height="28">
            </span>
        </a>

        <a href="index.html" class="logo logo-light">
            <span class="logo-lg">
                <img src="<?= base_url(); ?>assets/admin/images/logo-light.png" alt="" height="30">
            </span>
            <span class="logo-sm">
                <img src="<?= base_url(); ?>assets/admin/images/logo-light-sm.png" alt="" height="26">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
        <i class="bx bx-menu align-middle"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <!-- Banner -->
                <li>
                    <a href="<?= base_url('banner'); ?>">
                        <i class="bx bx-image icon nav-icon"></i>
                        <span class="menu-item" data-key="t-banner">Banner</span>
                    </a>
                </li>

                <!-- Header -->
                <li>
                    <a href="<?= base_url('header'); ?>">
                        <i class="bx bx-image icon nav-icon"></i>
                        <span class="menu-item" data-key="t-banner">Header</span>
                    </a>
                </li>
                <!-- Testimoni -->
                <li>
                    <a href="<?= base_url('testimoni'); ?>">
                        <i class="bx bx-image icon nav-icon"></i>
                        <span class="menu-item" data-key="t-banner">Testimoni</span>
                    </a>
                </li>

                <!-- Product -->
                <li>
                    <a href="<?= base_url('products'); ?>">
                        <i class="bx bx-box icon nav-icon"></i>
                        <span class="menu-item" data-key="t-product">Product</span>
                    </a>
                </li>


                <!-- Category -->
                <li>
                    <a href="<?= base_url('category'); ?>">
                        <!-- Replace with a different Boxicons icon (e.g., bx-cube) -->
                        <i class="bx bx-cube icon nav-icon"></i>
                        <span class="menu-item" data-key="t-category">Category</span>
                    </a>
                </li>

                <!-- Blog -->
                <li>
                    <a href="<?= base_url('blog'); ?>">
                        <i class="bx bx-book icon nav-icon"></i>
                        <span class="menu-item" data-key="t-blog">Blog</span>
                    </a>
                </li>

                <!-- About Us -->
                <li>
                    <a href="<?= base_url('about'); ?>">
                        <i class="bx bx-info-circle icon nav-icon"></i>
                        <span class="menu-item" data-key="t-about-us">About Us</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>