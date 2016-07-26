<!-- navbar top -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
    <!-- navbar-header -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('home'); ?>">
            <img src="<?php echo base_url(); ?>assets/img/soundcheck.png" alt="" />
        </a>
    </div>
    <!-- end navbar-header -->
    <!-- navbar-top-links -->
    <ul class="nav navbar-top-links navbar-right">

        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('mapa.html') ?>">
                <h3>Map</h3>
            </a>
        </li>
        <!-- end  -->

        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('bands') ?>">
                <h3>Bands</h3>
            </a>
        </li>
        <!-- end  -->

        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('studios') ?>">
                <h3>Studios</h3>
            </a>
        </li>
        <!-- end  -->

        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('venues') ?>">
                <h3>Venues</h3>
            </a>
        </li>
        <!-- end  -->

        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('events') ?>">
                <h3>Events</h3>
            </a>
        </li>
        <!-- end  -->

        <?php
            if($this->session->userdata('user')['permission'] != 'fa') {
        ?>
        <!--  -->
        <li class="dropdown">
            <a class="dropdown-toggle" href="<?php echo base_url('gigs') ?>">
                <h3>Gigs</h3>
            </a>
        </li>
        <!-- end  -->
        <?php
            }
        ?>

        <!-- main dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-3x"></i>
            </a>
            <!-- dropdown user-->
            <ul class="dropdown-menu dropdown-user">
                <?php
                    if($this->session->userdata('user')['permission'] != 'M&M') {
                ?>
                <li>
                    <a href="<?php echo base_url('users/upgradeAccount') ?>"><i class="fa fa-level-up fa-fw"></i></i>Upgrade Account</a>
                </li>
                <li class="divider"></li>
                <?php
                    }
                ?>

                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                </li>
            </ul>
            <!-- end dropdown-user -->
        </li>
        <!-- end main dropdown -->

    </ul>
    <!-- end navbar-top-links -->

</nav>
<!-- end navbar top -->