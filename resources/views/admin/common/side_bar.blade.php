<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin::Aside Brand -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="index.html">
                <img alt="Logo" src="{{ asset('admin/assets/media/logos/logo-6.png') }}" />
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left"
                id="kt_aside_toggler"><span></span></button>
        </div>
    </div>

    <!-- end:: Aside Brand -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
            data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here"
                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                        class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-graphic"></i><span
                            class="kt-menu__link-text">CMS</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                    class="kt-menu__link"><span class="kt-menu__link-text">CMS</span></span></li>

                            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('admin/settings') }}"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Settings</span></a></li>
                            {{-- <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-aside.html"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Brand Aside</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/navy-header.html"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Navy Header</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/light-aside.html"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Light Aside</span></a></li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="dashboards/brand-header.html"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">Brand Header</span></a></li> --}}
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i
                            class="kt-menu__link-icon flaticon2-graphic"></i><span class="kt-menu__link-text">Pages</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span
                                        class="kt-menu__link-text">Pages</span></span></li>
                            @php
                                $pages = $helpers->pages();
                            @endphp
                            @foreach ($pages as $item)
                              <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a href="{{ url('admin/edit_page/'.$item->page_slug) }}"
                                    class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">{{ $item->page_name }}</span></a></li>  
                            @endforeach
                            
                            
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i
                            class="kt-menu__link-icon flaticon2-graphic"></i><span class="kt-menu__link-text">Pages Sub Sections</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span
                                        class="kt-menu__link-text">Pages Sub Sections</span></span></li>
                            @php
                            $pages = $helpers->sub_sections();
                            @endphp
                            @foreach ($pages as $item)
                            <li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true"><a
                                    href="{{ url('admin/edit_page_sections/'.@$item->page_slug) }}" class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">{{ $item->page_name }}</span></a></li>
                            @endforeach
                
                
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i
                            class="kt-menu__link-icon flaticon2-graphic"></i><span class="kt-menu__link-text">Blogs</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span
                                        class="kt-menu__link-text">Blogs</span></span></li>
                            
                            <li class="kt-menu__item " aria-haspopup="true"><a href="{{ url('admin/blogs') }}" class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                        class="kt-menu__link-text">All Blogs</span></a></li>
                
                        </ul>
                    </div>
                </li>
                {{-- <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Custom</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i
                            class="kt-menu__link-icon flaticon2-telegram-logo"></i><span
                            class="kt-menu__link-text">Apps</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                    class="kt-menu__link"><span class="kt-menu__link-text">Apps</span></span></li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                                data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                        class="kt-menu__link-text">Users</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                                class="kt-menu__link"><span
                                                    class="kt-menu__link-text">Users</span></span></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/users/list-columns-1.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">List - Columns 1</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/users/list-columns-2.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">List - Columns 2</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/users/list-columns-3.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">List - Columns 3</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/users/list-row.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">List - Row</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/users/list-datatable.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">List - Datatable</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/users/add.html"
                                                class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Add User</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/users/edit.html"
                                                class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Edit User</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                                data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                                    class="kt-menu__link kt-menu__toggle"><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                        class="kt-menu__link-text">Profile</span><i
                                        class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
                                                class="kt-menu__link"><span
                                                    class="kt-menu__link-text">Profile</span></span></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/overview-1.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Overview 1</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/overview-2.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Overview 2</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/overview-3.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Overview 3</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/personal-information.html"
                                                class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Personal Information</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/account-settings.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Account Settings</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/change-password.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">Change Password</span></a></li>
                                        <li class="kt-menu__item " aria-haspopup="true"><a
                                                href="custom/profile/user-settings.html" class="kt-menu__link "><i
                                                    class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                                    class="kt-menu__link-text">User Settings</span></a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true"><a href="custom/inbox.html"
                                    class="kt-menu__link "><i
                                        class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span
                                        class="kt-menu__link-text">Inbox</span><span class="kt-menu__link-badge"><span
                                            class="kt-badge kt-badge--danger kt-badge--inline">new</span></span></a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
             
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->

    <!-- begin:: Aside Footer -->
    {{-- <div class="kt-aside__footer kt-grid__item" id="kt_aside_footer">
        <div class="kt-aside__footer-nav">
            <div class="kt-aside__footer-item">
                <a href="#" class="btn btn-icon"><i class="flaticon2-gear"></i></a>
            </div>
            <div class="kt-aside__footer-item">
                <a href="#" class="btn btn-icon"><i class="flaticon2-cube"></i></a>
            </div>
            <div class="kt-aside__footer-item">
                <a href="#" class="btn btn-icon"><i class="flaticon2-bell-alarm-symbol"></i></a>
            </div>
            <div class="kt-aside__footer-item">
                <button type="button" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="flaticon2-add"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-left">
                    <ul class="kt-nav">
                        <li class="kt-nav__section kt-nav__section--first">
                            <span class="kt-nav__section-text">Export Tools</span>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <i class="kt-nav__link-icon la la-print"></i>
                                <span class="kt-nav__link-text">Print</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <i class="kt-nav__link-icon la la-copy"></i>
                                <span class="kt-nav__link-text">Copy</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                <span class="kt-nav__link-text">Excel</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                <span class="kt-nav__link-text">CSV</span>
                            </a>
                        </li>
                        <li class="kt-nav__item">
                            <a href="#" class="kt-nav__link">
                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                <span class="kt-nav__link-text">PDF</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-aside__footer-item">
                <a href="#" class="btn btn-icon"><i class="flaticon2-calendar-2"></i></a>
            </div>
        </div>
    </div> --}}

    <!-- end:: Aside Footer-->
</div>

<!-- end:: Aside -->