<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                    <!-- Inner Menu: contains the notifications -->
                    <ul class="menu">
                        <li><!-- start notification -->
                            <a href="#">
                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                        </li><!-- end notification -->
                    </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
            </ul>
        </li>
        @endif

        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                    <ul class="menu">
                        <li>
                            <a href="#">
                                <h3>
                                    Design some buttons
                                    <small class="pull-right">20%</small>
                                </h3>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">20% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer">
                    <a href="#">View all tasks</a>
                </li>
            </ul>
        </li>
        @endif

        @guest
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    @if(file_exists(Auth::user()->avatar->thumb))
                        <img src="{{ Auth::user()->avatar->thumb}}" class="user-image" alt="User Image"/>
                    @else
                        <img src="<?php echo e(asset('admin/img/laravel.png')); ?>" class="user-image" alt="User Image"/>
                    @endif
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="{{ Auth::user()->avatar->thumb }}" class="img-circle" alt="User Image" />
                        <p>
                            {{ Auth::user()->name }}
                            <?php
                            $datec = Auth::user()['created_at'];
                            ?>
                            <small>Member since <?php echo date("M. Y", strtotime(Auth::user()->created)); ?></small>
                        </p>
                    </li>
                    @role("SUPER_ADMIN")
                    <li class="user-body">
                        <div class="col-xs-6 text-center mb10">
                            <a href="{{ url(config('backend.route') . '/lacodeeditor') }}"><i class="fa fa-code"></i> <span>Editor</span></a>
                        </div>
                        <div class="col-xs-6 text-center mb10">
                            <a href="{{ url(config('backend.route') . '/modules') }}"><i class="fa fa-cubes"></i> <span>Modules</span></a>
                        </div>
                        <div class="col-xs-6 text-center mb10">
                            <a href="{{ url(config('backend.route') . '/la_menus') }}"><i class="fa fa-bars"></i> <span>Menus</span></a>
                        </div>
                        <div class="col-xs-6 text-center mb10">
                            <a href="{{ url(config('backend.route') . '/la_configs') }}"><i class="fa fa-cogs"></i> <span>Configure</span></a>
                        </div>
                        <div class="col-xs-6 text-center">
                            <a href="{{ url(config('backend.route') . '/backups') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a>
                        </div>
                    </li>
                    @end
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{ url(config('backend.route') . '/admin/') .'/'. Auth::user()->id }}" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route(config('backend.route') . '.logout') }}" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                    </li>
                </ul>
            </li>
        @endif

        @env('BACKEND_SHOW_CONTROLS', 1)
        <!-- Control Sidebar Toggle Button -->
        <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-comments-o"></i> <span class="label label-warning">10</span></a>
        </li>
        @endif
    </ul>
</div>
