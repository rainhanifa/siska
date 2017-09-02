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
                <li <?php echo ($controller == 'income' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('income')?>">
                        <i class="ti-envelope"></i>
                        <p>Income</p>
                    </a>
                </li>
                <li <?php echo ($controller == 'outcome' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('outcome')?>">
                        <i class="ti-shopping-cart"></i>
                        <p>Outcome</p>
                    </a>
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
                <li <?php echo ($controller == 'category' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('category')?>">
                        <i class="ti-wand"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li <?php echo ($controller == 'preferences' ? 'class="active"' : '')?>>
                    <a href="<?php echo base_url('preferences')?>">
                        <i class="ti-panel"></i>
                        <p>Preferences</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
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


