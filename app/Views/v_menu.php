<!-- ***** Main Menu Area Start ***** -->
<div class="mainMenu d-flex align-items-center justify-content-between">
    <!-- Close Icon -->
    <div class="closeIcon">
        <i class="ti-close" aria-hidden="true"></i>
    </div>
    <!-- Logo Area -->
    <div class="logo-area">
        <a href="<?= base_url(); ?>/"><img style="max-height: 40px;" src="img/ispumap_logo.png"></a>
    </div>
    <!-- Nav -->
    <div class="sonarNav">
        <nav>
            <ul>
                <li class="nav-item active">
                    <a class="nav-link" href="javascript:goto_area('home');">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('map');">Maps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('apps');">Apps</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('ispu');">ISPU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('news');">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('about_us');">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:goto_area('contact');">Contact Us</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Copwrite Text -->
    <div class="copywrite-text">
        <p>
            Copyright &copy;
            <script>
                document.write(new Date().getFullYear());
            </script>
            All rights reserved
        </p>
    </div>
</div>
<!-- ***** Main Menu Area End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="menu-area d-flex justify-content-between">
                    <!-- Logo Area  -->
                    <div class="logo-area">
                        <a href="<?= base_url(); ?>/"><img style="max-height: 40px;" src="img/ispumap_logo.png"></a>
                    </div>
                    <div class="menu-content-area d-flex align-items-center">
                        <span class="navbar-toggler-icon" id="menuIcon"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->