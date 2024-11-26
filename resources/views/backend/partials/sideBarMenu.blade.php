<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-45">
            <img src="{{asset('afriDash.png')}}" width="40" alt="AfrDash">
        </div>
        <div class="sidebar-brand-text mx-3">AfrDash</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-activity">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
            </svg>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Projects -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects" aria-expanded="true"
           aria-controls="collapseProjects">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Projects</span></a>
        <div id="collapseProjects" class="collapse" aria-labelledby="headingProjects" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('projects.index')}}">All projects</a>
                @canany(['isEditor', 'isManager', 'isAdmin'])
                    <a class="collapse-item" href="{{route('projects.create')}}">Create new project</a>
                @endcanany
                <a class="collapse-item" href="{{route('categories.index')}}">Categories</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Posts -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePost" aria-expanded="true"
            aria-controls="collapsePost">
            <i class="fas fa-fw fa-sticky-note"></i>
            <span>Posts</span></a>
        <div id="collapsePost" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('posts.index')}}">All Posts</a>
                @canany(['isEditor', 'isManager', 'isAdmin'])
                <a class="collapse-item" href="{{route('posts.create')}}">Create New Post</a>
                @endcanany
                <a class="collapse-item" href="{{route('categories.index')}}">Categories</a>
            </div>
        </div>
    </li>

        <!-- Nav Item - Media -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCase" aria-expanded="true"
                aria-controls="collapseCase">
                <i class="fas fa-fw fa-images"></i>
                <span>Clients</span></a>
            <div id="collapseCase" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Select what you want :</h6>
                    <a class="collapse-item" href="{{route('clients.index')}}">All Clients</a>
                    <a class="collapse-item" href="{{route('clients.create')}}">Create New Client</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Mail -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMail" aria-expanded="true"
                aria-controls="collapseMail">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Mail</span></a>
            <div id="collapseMail" class="collapse" aria-labelledby="headingMail" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Select what you want :</h6>
                    <a class="collapse-item" href="{{route('emails.index')}}">All Mails</a>   
                </div>
            </div>
        </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Settings
    </div>

    @canany(['isAdmin', 'isManager'])
    <!-- Nav Item - Users -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Select what you want :</h6>
                <a class="collapse-item" href="{{route('users.index')}}">All Users</a>
                @can('isAdmin')
                <a class="collapse-item" href="{{route('roles.index')}}">User Roles</a>
                @endcan
            </div>
        </div>
    </li>
    @endcanany

{{--    <li class="nav-item">--}}

{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"--}}
{{--            aria-expanded="true" aria-controls="collapseAccount">--}}
{{--            <i class="fas fa-cogs fa-fw"></i>--}}
{{--            <span>Account</span></a>--}}
{{--        <div id="collapseAccount" class="collapse" aria-labelledby="headingPost" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <h6 class="collapse-header">Select what you want :</h6>--}}
{{--                <a class="collapse-item" href="{{route('account.index')}}">Profile</a>--}}
{{--                <a class="collapse-item" href="{{route('security.index')}}">Security</a>--}}
{{--                <a class="collapse-item" href="{{route('notifications.index')}}">Notifications</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" aria-label="Toggle Side bar" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->