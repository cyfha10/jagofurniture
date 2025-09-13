<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="<?= base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>CRUD FORM</span>
                </a>
                <ul class="sub">
                    <li><a href="<?= base_url('banner'); ?>">BANNER</a></li>
                    <li><a href="<?= base_url('blogs'); ?>">BLOG</a></li>
                    <li><a href="<?= base_url('category'); ?>">CATEGORY</a></li>
                    <li><a href="<?= base_url('products'); ?>">PRODUCT</a></li>
                    <li><a href="<?= base_url('testimoni'); ?>">TESTIMONI</a></li>
                    <li><a href="<?= base_url('socialmedia'); ?>">SOCIAL MEDIA</a></li>
                    <li><a href="<?= base_url('header'); ?>">HEADER</a></li>
                    <li><a href="<?= base_url('about'); ?>">ABOUT US</a></li>
                </ul>
            </li>

            <li>
                <a href="<?= base_url('login/logout'); ?>">
                    <i class="fa fa-user"></i>
                    <span>Login Page</span>
                </a>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->