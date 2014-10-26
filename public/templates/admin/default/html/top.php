<div class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <!-- Menu button for smallar screens -->
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?php echo $this->baseUrl('admin'); ?>" class="navbar-brand"><?php echo __('Admin') ?><span class="bold">Decode</span></a>
        </div>
        <!-- Site name for smallar screens -->
        <!-- Navigation starts -->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">     
            <!-- Links -->
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i> <?php echo __('languages') ?> 
                        <?php
                        $languages = New Zend_Session_Namespace('languages');
                        if ($languages->languages === 'en'):
                            ?>
                            <span class="badge badge-important"><?php echo __('english')?></span> 
                        <?php else: ?>
                            <span class="badge badge-important"><?php echo __('vietnamese')?></span> 
                        <?php endif; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->baseUrl($this->currentController."/index/lang/en")?>"><i class="fa fa-user"></i><?php echo __('english')?></a></li>
                        <li><a href="<?php echo $this->baseUrl($this->currentController."/index/lang/vi")?>"><i class="fa fa-user"></i><?php echo __('vietnamese')?></a></li>
                    </ul>
                </li>
                <li class="dropdown">            
                    <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">
                        <img src="<?php echo $this->imgUrl ?>/User_Circle.png" alt="" class="nav-user-pic img-responsive" />
                        <?php
                        $login = new Zend_Session_Namespace('login_admin');
                        $user_info = $login->user_info;
                        echo $user_info['user_name'];
                        ?>
                        <b class="caret"></b>  
                    </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i><?php echo __('profile')?></a></li>
                        <li><a href="<?php echo $this->baseUrl('admin/settings') ?>"><i class="fa fa-cogs"></i><?php echo __('settings')?></a></li>
                        <li><a href="<?php echo $this->baseUrl('admin/system/logout') ?>"><i class="fa fa-power-off"></i><?php echo __('logout')?></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>