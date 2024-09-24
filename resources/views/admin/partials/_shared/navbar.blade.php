<div class="sidebar-content">
    <!-- User -->
    <div class="sidebar-user">
        <div class="category-content">
            <div class="media">
                <a href="#" class="media-left">
                @if(Auth::guard('admin')->user()->avatar)
                	<img src="{{ Auth::guard('admin')->user()->avatar}}" class="img-circle img-sm" alt="">
                @else
                	<img src="https://robohash.org/{{Auth::guard('admin')->user()->name}}.png?set=set4&size=100x100" class="img-sm">
                @endif
                </a>
                <div class="media-body">
                    <span class="media-heading text-semibold">{{ Auth::guard('admin')->user()->name }}</span>
                    <div class="text-size-mini text-muted">
                        <i class="icon-circle2 text-size-small text-success"></i> 
                         @if(Auth::guard('admin')->user()->is_root)
		                	&nbsp;Boss
		                @else
		                	&nbsp;@lang('text.hdr.admin')
		                @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /user -->
    <!-- Main navigation -->
    <div id="sidebar-menu" class="sidebar-category sidebar-category-visible">
        <div class="category-content no-padding">
            <ul class="navigation navigation-main navigation-accordion">
                <li><a href="{{route('admin.home.index')}}"><i class="fa fa-dashboard"></i><span>@lang('text.hdr.dashboard')</span></a></li>
                <li><a href="#"><i class="fa fa-users"></i> <span>@lang('text.hdr.user')</span></a>
                    <ul>
                        <li><a href="{{route('admin.user.index')}}"><i class="fa fa-user"></i>@lang('text.hdr.user_user')</a></li>
                        <li><a href="{{route('admin.permission.index')}}"><i class="fa fa-key"></i>@lang('text.hdr.user_power')</a></li>
                    </ul>
                </li>
                
                <li><a href="{{route('admin.chart.index')}}"><i class="fa fa-pie-chart"></i> <span>@lang('text.hdr.chart')</span></a></li>
                <li><a href="{{route('admin.type.index')}}"><i class="fa fa-newspaper-o"></i> <span>@lang('text.hdr.type')</span></a></li>
                <li><a href="{{route('admin.faq.index')}}"><i class="fa fa-question-circle"></i> <span>@lang('text.hdr.faq')</span></a></li>
                <li><a href="{{route('admin.setting.index')}}"><i class="icon-gear"></i> <span>@lang('text.hdr.setting')</span></a></li>
                <hr style="border: 1px dashed #ccc;" />
                <li><a href="{{ route('logout') }}"><i class="icon-switch2"></i> <span>@lang('text.logout')</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /main navigation -->
</div>