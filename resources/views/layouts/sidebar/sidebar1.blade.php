<ul class="navbar-nav sidebar-bg sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-dashcube"></i>
        </div>
        <div class="sidebar-brand-text mx-1">W2Solutions</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php $role = Auth()->user()->role_id; $menus = App\Roles::with('menus')->where('id', $role)->get();
     foreach($menus as $menu){
        foreach($menu->menus as $sepmenu){
            ?>
            <li class="<?= ( Request::segment(1) == $sepmenu->slug ? ' nav-item active' : 'nav-item'); ?>">
            <a class="nav-link" href="{{url("$sepmenu->url")}}">
            <i class="{{$sepmenu->icon}}" aria-hidden="true"></i>
            <span>{{$sepmenu->name}}</span>
            </a>
            </li>
        <?php }
    } ?>

    <?php /*<!-- Nav Item - Dashboard -->
    <li class="<?= ( Request::segment(1) == 'dashboard' ? ' nav-item active' : 'nav-item'); ?>">
        <a class="nav-link" href="{{url('/dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt" aria-hidden="true"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Tables -->
    <?php
        $urls = array('users');
        $hrefClass='nav-item';
        if(in_array(Request::segment(1),$urls)){
          $hrefClass = 'nav-item active';
        }
    ?>
    <li class="{{$hrefClass}}">
        <a class="nav-link" href="{{url('users')}}">
        <i class="fas fa-fw fa-users" aria-hidden="true"></i>
        <span>Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <?php
        $urls = array('roles');
        $hrefClass='nav-item';
        if(in_array(Request::segment(1),$urls)){
          $hrefClass = 'nav-item active';
        }
    ?>
    <li class="{{$hrefClass}}">
        <a class="nav-link" href="{{url('roles')}}">
        <i class="fas fa-fw fa-tasks" aria-hidden="true"></i>
        <span>Roles</span></a>
    </li>*/ ?>
    
    
    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>