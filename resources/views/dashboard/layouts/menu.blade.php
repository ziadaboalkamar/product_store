<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="">
                    <span class="brand-logo">
                        <img src="" alt="" srcset="">
                    </span>
                    <h2 class="brand-text" style="font-size: 18px"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">




                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='truck'></i><span
                            class="menu-title text-truncate" data-i18n="Invoice">المخازن</span><span
                            class="badge badge-light-warning badge-pill ml-auto mr-1">{{ \App\Models\Store::count() }}</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="{{ route('admin.stores') }}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كافة
                                    المخازن</span></a>
                        <li><a class="d-flex align-items-center" href="{{route('stores.create')}}"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">انشاء
                                    مخزن</span></a>
                        </li>

                    </ul>
                </li>

            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='truck'></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">الاصناف</span><span
                        class="badge badge-light-warning badge-pill ml-auto mr-1">{{ \App\Models\Product::count() }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('admin.product') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">كافة
                                    الاصناف</span></a>
                    <li><a class="d-flex align-items-center" href="{{route('product.create')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">انشاء
                                    صنف</span></a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='truck'></i><span
                        class="menu-title text-truncate" data-i18n="Invoice">الفواتير</span><span
                        class="badge badge-light-warning badge-pill ml-auto mr-1">{{ \App\Models\Invoice::count() }}</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="{{ route('admin.invoice.sale') }}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">فواتير
                                    البيع</span></a>
                    <li><a class="d-flex align-items-center" href="{{route('admin.invoice.buy')}}"><i
                                data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="List">فواتير
                                    الشراء</span></a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
