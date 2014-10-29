<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>
    <div class="sidebar-inner">
        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
        <ul class="navi">
            <!-- Use the class nred, ngreen, nblue, nlightblue, nviolet or norange to add background color. You need to use this in <li> tag. -->

            <li class="nred current"><a href="<?php echo $this->baseUrl('admin/settings'); ?>"><i class="fa fa-desktop"></i> <?php echo __('Dashboard')?></a></li>
            <!-- Menu with sub menu -->
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('Bookings')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="<?php echo $this->baseUrl('admin/bookings'); ?>"><?php echo __('View all bookings')?></a></li>
                </ul>
            </li>
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('Games')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="<?php echo $this->baseUrl('admin/games'); ?>"><?php echo __('View all games')?></a></li>
                    <li><a href="<?php echo $this->baseUrl('admin/games/add'); ?>"><?php echo __('Add new game')?></a></li>
                </ul>
            </li>
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('Prices')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="<?php echo $this->baseUrl('admin/prices'); ?>"><?php echo __('View all prices')?></a></li>
                    <li><a href="<?php echo $this->baseUrl('admin/prices/update'); ?>"><?php echo __('Add new price')?></a></li>
                </ul>
            </li>
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('Times')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="<?php echo $this->baseUrl('admin/times'); ?>"><?php echo __('View all times')?></a></li>
                    <li><a href="<?php echo $this->baseUrl('admin/times/update'); ?>"><?php echo __('Add new time')?></a></li>
                </ul>
            </li>
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('FAQs')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="<?php echo $this->baseUrl('admin/faqs') ?>"><?php echo __('View all FAQs')?></a></li>
                    <li><a href="<?php echo $this->baseUrl('admin/faqs/add')?>"><?php echo __('Add new FAQ')?></a></li>
                </ul>
            </li>
            <li class="has_submenu nlightblue">
                <a href="#">
                    <!-- Menu name with icon -->
                    <i class="fa fa-th"></i> <?php echo __('Users')?>
                    <!-- Icon for dropdown -->
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </a>
                <ul>
                    <li><a href="#"><?php echo __('View all users')?></a></li>
                    <li><a href="#"><?php echo __('Add new user')?></a></li>
                </ul>
            </li>
        </ul>
        <!--/ Sidebar navigation -->

        <!-- Date -->
        <div class="sidebar-widget">
            <div id="todaydate"></div>
        </div>
    </div>
</div>
<!-- Sidebar ends -->