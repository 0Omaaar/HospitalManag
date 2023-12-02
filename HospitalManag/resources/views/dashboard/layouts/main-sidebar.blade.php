<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('backDashboard/assets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('backDashboard/assets/img/brand/logo-white.png') }}" class="main-logo dark-theme"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('backDashboard/assets/img/brand/favicon.png') }}" class="logo-icon"
                alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . ($page = 'index')) }}"><img
                src="{{ URL::asset('backDashboard/assets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme"
                alt="logo"></a>
    </div>
    @if(\Auth::guard('admin')->check())
        @include('dashboard.layouts.main-sidebar.admin-sidebar')
    @endif

    @if(\Auth::guard('doctor')->check())
        @include('dashboard.layouts.main-sidebar.main-sidebar-doctor')
    @endif

    @if(\Auth::guard('ray_employee')->check())
        @include('dashboard.layouts.main-sidebar.ray_employee-sidebar')
    @endif

    @if(\Auth::guard('laboratorie_employee')->check())
        @include('dashboard.layouts.main-sidebar.laboratorie_employee-sidebar')
    @endif

    @if(\Auth::guard('patient')->check())
        @include('dashboard.layouts.main-sidebar.patient-sidebar')
    @endif
</aside>
<!-- main-sidebar -->
