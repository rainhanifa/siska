<?php $controller = strtolower($this->router->fetch_class());?>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    SISKA ILLIYIN
                </a>
            </div>

            <ul class="nav">
                <li <?php echo ($controller == 'dashboard' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('dashboard')?>">
                        <i class="ti-stats-up"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li <?php echo ($controller == 'income' || $controller == 'outcome') ? 'class="active"' : ''?>>
                    <a href="#transaction_submenu" data-toggle="collapse">
                        <i class="ti-shopping-cart"></i>
                        <p>Transaction <span class="pull-right"><b class="caret"></b></span></p>
                    </a>
                    <div class="collapse" id="transaction_submenu">
                        <ul class="nav submenu">
                            <li><a href="<?php echo base_url('outcome')?>"><p><i class="ti-shift-right"></i> Outcome</p></a></li>
                            <li><a href="<?php echo base_url('income')?>"><p><i class="ti-shift-left"></i> Income</p></a></li>
                            <li><a href="<?php echo base_url('fine')?>"><p><i class="ti-receipt"></i> Denda</p></a></li>
                        </ul>
                    </div>
                </li>
                <li <?php echo ($controller == 'capital' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('capital')?>">
                        <i class="ti-wallet"></i>
                        <p>Modal</p>
                    </a>
                </li>
                <li <?php echo ($controller == 'deviden' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('deviden')?>">
                        <i class="ti-star"></i>
                        <p>Deviden</p>
                    </a>
                </li>
                <li <?php echo ($controller == 'member' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('member')?>">
                        <i class="ti-user"></i>
                        <p>Member</p>
                    </a>
                </li>

                <li <?php echo ($controller == 'category' || $controller == 'preferences') ? 'class="active"' : ''?>>
                    <a href="#setting_submenu" data-toggle="collapse">
                        <i class="ti-panel"></i>
                        <p>Setting <span class="pull-right"><b class="caret"></b></span></p>
                    </a>
                    <div class="collapse" id="setting_submenu">
                        <ul class="nav submenu">
                            <li><a href="<?php echo base_url('preferences')?>"><p><i class="ti-key"></i> Range</p></a></li>
                            <li><a href="<?php echo base_url('category')?>"><p><i class="ti-wand"></i> Category</p></a></li>
                            <li><a href="<?php echo base_url('category')?>"><p><i class="ti-id-badge"></i> User</p></a></li>
                        </ul>
                    </div>
                </li>

                <li <?php echo ($controller == 'category' || $controller == 'preferences') ? 'class="active"' : ''?>>
                    <a href="#report_submenu" data-toggle="collapse">
                        <i class="ti-files"></i>
                        <p>Report <span class="pull-right"><b class="caret"></b></span></p>
                    </a>
                    <div class="collapse" id="report_submenu">
                        <ul class="nav submenu">
                            <li><a href="<?php echo base_url('preferences')?>"><p><i class="ti-file"></i> Closing</p></a></li>
                            <li><a href="<?php echo base_url('category')?>"><p><i class="ti-file"></i> Monthly Report</p></a></li>
                            <li><a href="<?php echo base_url('category')?>"><p><i class="ti-file"></i> Yearly Report</p></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"> <?php echo $title ?></a>
                </div>
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
        </nav>


