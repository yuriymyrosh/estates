<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{Request::is('estates*') ? 'active' : ''}}">
                <a href="{{ route('estates.index') }}">
                    <i class="fa fa-table"></i>
                    <span>Квартири</span>
                </a>
            </li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
                <li class="{{Request::is('users*') ? 'active' : ''}}">
                    <a href="{{ route('users.index') }}">
                        <i class="fa fa-files-o"></i>
                        <span>Користувачі</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>