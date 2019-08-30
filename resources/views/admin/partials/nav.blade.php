<section id="container">
    <!--header start-->
    <header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="{{route('manage.index')}}" class="logo">
            Logo
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <!--<li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-success">8</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <li>
                        <p class="">You have 8 pending tasks</p>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info clearfix">
                                <div class="desc pull-left">
                                    <h5>Target Sell</h5>
                                    <p>25% , Deadline  12 June’13</p>
                                </div>
                                        <span class="notification-pie-chart pull-right" data-percent="45">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info clearfix">
                                <div class="desc pull-left">
                                    <h5>Product Delivery</h5>
                                    <p>45% , Deadline  12 June’13</p>
                                </div>
                                        <span class="notification-pie-chart pull-right" data-percent="78">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info clearfix">
                                <div class="desc pull-left">
                                    <h5>Payment collection</h5>
                                    <p>87% , Deadline  12 June’13</p>
                                </div>
                                        <span class="notification-pie-chart pull-right" data-percent="60">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info clearfix">
                                <div class="desc pull-left">
                                    <h5>Target Sell</h5>
                                    <p>33% , Deadline  12 June’13</p>
                                </div>
                                        <span class="notification-pie-chart pull-right" data-percent="90">
                                <span class="percent"></span>
                                </span>
                            </div>
                        </a>
                    </li>
    
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </li>-->
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <!--<li id="header_inbox_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-important">4</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <li>
                        <p class="red">You have 4 Mails</p>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="admin/images/3.png"></span>
                                    <span class="subject">
                                    <span class="from">Jonathan Smith</span>
                                    <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hello, this is an example msg.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="admin/images/1.png"></span>
                                    <span class="subject">
                                    <span class="from">Jane Doe</span>
                                    <span class="time">2 min ago</span>
                                    </span>
                                    <span class="message">
                                        Nice admin template
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="admin/images/3.png"></span>
                                    <span class="subject">
                                    <span class="from">Tasi sam</span>
                                    <span class="time">2 days ago</span>
                                    </span>
                                    <span class="message">
                                        This is an example msg.
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <span class="photo"><img alt="avatar" src="admin/images/default-profile.jpg"></span>
                                    <span class="subject">
                                    <span class="from">Mr. Perfect</span>
                                    <span class="time">2 hour ago</span>
                                    </span>
                                    <span class="message">
                                        Hi there, its a test
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">See all messages</a>
                    </li>
                </ul>
            </li>-->
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <!--<li id="header_notification_bar" class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-warning">1</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li>
                        <p>Notifications</p>
                    </li>
                    <li>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #1 overloaded.</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="alert alert-danger clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #2 overloaded.</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="alert alert-success clearfix">
                            <span class="alert-icon"><i class="fa fa-bolt"></i></span>
                            <div class="noti-info">
                                <a href="#"> Server #3 overloaded.</a>
                            </div>
                        </div>
                    </li>
    
                </ul>
            </li>-->
            <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>
                <input type="text" class="form-control search" placeholder=" Search">
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="{{asset('admin/images/default-profile.jpg')}}">
                    <span class="username">{{ Auth::user()->name }}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">                                                        
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Log Out</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
            <!-- user login dropdown end -->
           
        </ul>
        <!--search & user info end-->
    </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="{{ Request::is('manage') ? "active" : "" }}" href="{{route('manage.index')}}">
                            <i class="fa fa-dashboard"></i>
                            <span>Панель</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('manage/lpage/1/edit') ? "active" : "" }}" href="{{route('manage.index')}}">
                            <i class="fa fa-pencil"></i>
                            <span>Контент</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('manage/products') ? "active" : "" }}" href="{{route('manage.index')}}">
                            <i class="fa fa-cubes"></i>
                            <span>Товары</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::is('manage/orders') ? "active" : "" }} sub-menu dcjq-parent-li" href="">
                            <i class="fa fa-envelope"></i>
                            <span>Управление заказами</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a class="{{ Request::is('manage/orders') ? "active" : "" }}" href="{{route('orders.index')}}">Заказы</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('manage/statuses') ? "active" : "" }}" href="{{route('statuses.index')}}">Статусы заказов</a>
                            </li>
                            <li>
                                <a class="{{ Request::is('manage/statuses/create') ? "active" : "" }}" href="{{route('statuses.create')}}">Новый статус</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                            <a class="{{ Request::is('manage/blogs') ? "active" : "" }} sub-menu dcjq-parent-li" href="">
                                <i class="fa fa-file-text-o "></i>
                                <span>Блог</span>
                            </a>
                            <ul class="sub">
                            <li>
                                <a class="{{ Request::is('manage/blogs') ? "active" : "" }}" href="{{route('blogs.index')}}">
                                    <i class="fa-file-text-o  fa"></i>
                                    <span>Посты</span>
                                </a>
                            </li>
                            <li>
                                <a class="{{ Request::is('manage/bsettings/1/edit') ? "active" : "" }}" href="{{route('bsettings.edit',1)}}">
                                    <i class="fa-gear fa"></i>
                                    <span>Настройки блога</span>
                                </a>
                            </li>
                            </ul>
                        </li>
                    <li>
                        <a class="{{ Request::is('manage/faqs') ? "active" : "" }} sub-menu dcjq-parent-li" href="">
                            <i class="fa fa-question-circle"></i>
                            <span>FAQ</span>
                        </a>
                        <ul class="sub">
                        <li>
                            <a class="{{ Request::is('manage/faqscat') ? "active" : "" }}" href="{{route('faqscat.index')}}">
                                <i class="fa-question-circle fa"></i>
                                <span>FAQ Категории</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('manage/faqs') ? "active" : "" }}" href="{{route('faqs.index')}}">
                                <i class="fa-question-circle fa"></i>
                                <span>FAQ</span>
                            </a>
                        </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a class="{{ Request::is('manage/settings/1/edit') ? "active" : "" }}" href="{{route('bsettings.edit',1)}}">
                            <i class="fa fa-gear"></i>
                            <span>Настройки</span>
                        </a>
                    </li>
                </ul>            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->