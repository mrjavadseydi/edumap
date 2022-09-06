<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="#" class="d-block">
                        {{auth()->user()->name}}
                    </a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @role('admin')
                        <li class="nav-item has-treeview">
                            <a href="{{route('state.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-xing"></i>
                                <p>
                                    مدیریت بخش ها
                                </p>
                            </a>
                        </li>
                    <li class="nav-item has-treeview">
                        <a href="{{route('book.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-book"></i>
                            <p>
                                مدیریت کتاب ها
                            </p>
                        </a>
                    </li>
                    @endrole

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
