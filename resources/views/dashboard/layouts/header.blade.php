<!-- Header start -->
<header class="header" style="height: 4rem">
    <div class="logo-wrapper">
        <a href="#" class="logo"  >
            <img src="{{ URL::asset('assets/img/icon.png')}}" alt="4Go Dashboard" />
        </a>

    </div>
    <div class="header-items">


        <!-- Header actions start -->
        <ul class="header-actions">

            <li class="dropdown">
                <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                    <i class="icon-bell"></i>
                    <span class="count-label">8</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right lrg" aria-labelledby="notifications">
                    <div class="dropdown-menu-header">
                        الاشعارات (40)
                    </div>
                    <ul class="header-notifications">
                        <li>
                            <a href="#">
                                <div class="user-img away">
                                    <img src="{{ URL::asset('assets/img/user21.png')}}" alt="User" />
                                </div>
                                <div class="details">
                                    <div class="user-title">Abbott</div>
                                    <div class="noti-details">Membership has been ended.</div>
                                    <div class="noti-date">Oct 20, 07:30 pm</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-img busy">
                                    <img src="{{ URL::asset('assets/img/user10.png')}}" alt="User" />
                                </div>
                                <div class="details">
                                    <div class="user-title">Braxten</div>
                                    <div class="noti-details">Approved new design.</div>
                                    <div class="noti-date">Oct 10, 12:00 am</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-img online">
                                    <img src="{{ URL::asset('assets/img/user6.png')}}" alt="User" />
                                </div>
                                <div class="details">
                                    <div class="user-title">Larkyn</div>
                                    <div class="noti-details">Check out every table in detail.</div>
                                    <div class="noti-date">Oct 15, 04:00 pm</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                    <span class="user-name">{{ Auth::user()->name }}</span>
                        <span class="avatar">
                            @if(Auth::user()->image != null)
                                <img src="{{ URL::asset(Auth::user()->image)}}" alt="{{ Auth::user()->name }}" />
                            @else
                                <img src="{{ URL::asset('assets/img/profile.jpg')}}" alt="{{ Auth::user()->name }}" />
                            @endif
                        <span class="status busy"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                    <div class="header-profile-actions">
                        <div class="header-user-profile">
                            <div class="header-user">
                                @if(Auth::user()->image != null)
                                    <img src="{{ URL::asset(Auth::user()->image)}}" alt="{{ Auth::user()->name }}" />
                                @else
                                    <img src="{{ URL::asset('assets/img/profile.jpg')}}" alt="{{ Auth::user()->name }}" />
                                @endif
                            </div>
                            <h5>{{ Auth::user()->name }}</h5>
                            <p>{{ Auth::user()->getRule() }}</p>
                        </div>
                        <a href="{{ URL::route('dashboard.profile') }}"><i class="icon-user1"></i>الصفحة الشخصية</a>
                        <a href="{{ URL::route('dashboard.changePassword') }}"><i class="icon-settings1"></i> تغيير كلمة المرور</a>
                        <a onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="icon-log-out1"></i> تسجيل الخروج</a>
                        <form id="frm-logout" action="{{ URL::route('dashboard.logout') }}" method="POST" style="display: none;">
                            @csrf
                            @method('POST')
                        </form>
                    </div>
                </div>
            </li>
            <li>
                <a href="#" class="quick-settings-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="نصائح وارشادات" style="font-family: 'Cairo', sans-serif !important;">
                    <i class="icon-list"></i>
                </a>
            </li>
        </ul>
        <!-- Header actions end -->
    </div>
</header>
<!-- Header end -->
