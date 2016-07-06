<!-- navbar side -->
<nav class="navbar-default navbar-static-side" role="navigation">
    <!-- sidebar-collapse -->
    <div class="sidebar-collapse">
        <!-- side-menu -->
        <ul class="nav" id="side-menu">
            

            <li>
                <!-- user image section-->
                <div class="user-section">
                    <div class="photo-center perfil-photo user-section-inner">
                        <img src="<?php echo base_url(); ?>content-uploaded/<?php echo $this->session->userdata('user')['photo']; ?>" alt="<?php echo $this->session->userdata('user')['photo']; ?>">
                    </div>
                    <div class="text-center user-info">
                        <div><?php echo $this->session->userdata('user')['name']; ?></div>
                    </div>
                </div>
                <!--end user image section-->
            </li>

            <li class="sidebar-search">
                <!-- search section-->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!--end search section-->
            </li>


            <li class="">
                <a href="<?php echo base_url('home'); ?>"><i class="fa fa-dashboard fa-fw"></i>Home</a>
            </li>

            <?php 
                if($this->session->userdata('user')['permission'] == 'musician') {
            ?>
                    <li>
                        <a href="<?php echo base_url('bands/myBands'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>My Bands</a>
                    </li>
            <?php 
                }
            ?>

            <?php
                if($this->session->userdata('user')['permission'] == 'manager') {
            ?>
            <li>
                <a href="<?php echo base_url('studios/myStudios'); ?>"><i class="fa fa-flask fa-fw"></i>My Studios</a>
            </li>
            <li>
                <a href="<?php echo base_url('venues/myVenues'); ?>"><i class="fa fa-table fa-fw"></i>My Venues</a>
            </li>
            <?php 
                }
            ?>

            <?php 
                if(!$this->session->userdata('user')['permission'] == 'fa') {
            ?>
            <li>
                <a href="<?php echo base_url('gigs/myGigs'); ?>"><i class="fa fa-edit fa-fw"></i>My Gigs</a>
            </li>
            <?php 
                }
            ?>

            <li>
                <a href="#"><i class="fa fa-search fa-fw"></i>Search</a>
                <ul class="nav nav-second-level">
                    <li>
                        <a class="submenu" href="<?php echo base_url('bands'); ?>"><i class="fa fa-bar-chart-o fa-fw"></i>Bands</a>
                    </li>

                    <li>
                        <a class="submenu" href="<?php echo base_url('studios'); ?>"><i class="fa fa-flask fa-fw"></i>Studios</a>
                    </li>
                    <li>
                        <a class="submenu" href="<?php echo base_url('venues'); ?>"><i class="fa fa-table fa-fw"></i>Venues</a>
                    </li>
                    <li>
                        <a class="submenu" href="<?php echo base_url('gigs'); ?>"><i class="fa fa-edit fa-fw"></i>Gigs</a>
                    </li>
                </ul>
            </li>
            
        </ul>
        <!-- end side-menu -->
    </div>
    <!-- end sidebar-collapse -->
</nav>
<!-- end navbar side -->