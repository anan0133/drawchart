<div class="navbar-header">
    <a class="navbar-brand" href=""><img src="../assets/user/images/logo.png" alt=""/></a>
    <ul class="nav navbar-nav visible-xs-block">
        <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
</div>
<div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
        <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
    </ul>
    <div class="navbar-right">
        <ul class="nav navbar-nav">
            <li><a><i class="icon-user"></i> {{ Auth::guard('admin')->user()->name }}</a></li>
            <li><a href="{{ route('logout')}}" ><i class="icon-switch2"></i> @lang('text.logout')</a></li>
        </ul>           
    </div>
</div> 