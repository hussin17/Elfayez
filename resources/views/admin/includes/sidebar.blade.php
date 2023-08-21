        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">الادارة</span>
                        </li>
                        {{-- Roles --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">الادوار والمسؤوليات </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.roles.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> عرض الكل</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.roles.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه دور </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- Permission --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">الاذونات </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.permissions.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> عرض الكل</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.permissions.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه اذن </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Basics --}}
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">الاساسيات</span>
                        </li>
                        {{-- .rate --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">الصف الدراسي </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.grades.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> عرض الكل</span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.grades.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه صف </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Majors --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">التخصصات </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.majors.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> كل التخصصات </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.majors.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه تخصص </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Courses --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">الكورسات </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.courses.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> كل الكورسات </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.courses.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه كورس </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- levels --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">المستويات </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.levels.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> كل المستويات </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.levels.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه مستوى </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- Lessons --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">الدروس </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.lessons.index') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> كل الدروس </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="{{ route('admin.lessons.create') }}" class="sidebar-link">
                                        <i class="icon-Record"></i>
                                        <span class="hide-menu"> اضافه درس </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
