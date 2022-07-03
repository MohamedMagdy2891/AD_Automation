<!-- Navigation start -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="WafiAdminNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown" >
                <a class="nav-link  active-page" href="#" id="dashboardsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-devices_other nav-icon"></i>
                    لوحة التحكم
                </a>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-map nav-icon"></i>
                    المناطق و الحراجات
                </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.region.create') }}">اضافة منطقة</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.region.index') }}">كل المناطق</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.garage.create') }}">اضافة حراج</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.garage.index') }}">كل الحراجات</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-directions_car nav-icon"></i>
                    ماركات السيارات والسيارات
                </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.car-model.create') }}">اضافة ماركة سيارة</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.car-model.index') }}">كل ماركات السيارات</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.car.create') }}">اضافة سيارة</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.car.index') }}">كل السيارات</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-devices_other nav-icon"></i>
                    أجهزة تتبع السيارات
                </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.device.create') }}">اضافة جهاز تتبع لسيارة</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.device.index') }}">كل أجهزة تتبع السيارات</a>
                    </li>



                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> eaff86b4867d798a8b2098d1d003f8988697841a
                    <i class="icon-power nav-icon"></i>حالة السيارات  </a>
                <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.carstatuses.create') }}"> اضافة حالة جديدة</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.carstatuses.index') }}"> كل حالات السيارات</a>
                    </li>


                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<<<<<<< HEAD
>>>>>>> c88d5d403b1e8587616d778d6cd449442e2ca396
=======
=======
>>>>>>> 128babb790733925ad8c2c1f55db8eaf3b9b6533
>>>>>>> eaff86b4867d798a8b2098d1d003f8988697841a
                    <i class="icon-user nav-icon"></i>المستخدمين</a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ URL::route('dashboard.user.create') }}">اضافة مستخدم</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ URL::route('dashboard.user.index') }}"> عرض  كل المستخدمين</a>
                        </li>

                    </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-directions_car nav-icon"></i>حالة السيارات  </a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown"><li>
                    <a class="dropdown-item" href="{{ URL::route('dashboard.carstatuses.index') }}"> عرض  كل الحالات</a>
                </li></ul>

            </li>
            <li class="nav-item dropdown">
                <a class="nav-link " href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-directions_car nav-icon"></i> تصنيفات السيارات </a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown"><li>
                        <a class="dropdown-item" href="{{ URL::route('dashboard.carcategories.index') }}"> عرض  كل التصنيفات</a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
<!-- Navigation end -->
