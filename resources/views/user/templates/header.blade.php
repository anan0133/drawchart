<nav id="mainNav" class="navbar  navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" class="navbar-toggle collapsed">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#page-top" class="navbar-brand page-scroll">
				<img class="lg1" src="{{ $settings['site_logo'] }}"/>
				<img class="lg2" src="assets/user/images/logo-title.png"/>
			</a>
		</div>
		<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#page-top" class="page-scroll">@lang('text.nav.home')</a>
				</li>
				<li class="submenu">
				 	<a>@lang('text.nav.utility')
						<i class="fa fa-caret-down"></i>
				 	</a>
				 	
				    <ul class="submenu-down">
				    	<li>
				    		<a href="#weather-wrapper" class="page-scroll">@lang('text.nav.weather')<img src="assets/user/images/weather.png" alt="" title=""/></a>
				    	</li>
				    	<li role="separator" class="divider"></li>
				    	<li>
							<a href="#gdp" class="page-scroll">@lang('text.nav.gdp')<img src="assets/user/images/gdp.png" alt="" title=""/></a>
						</li>
						<li role="separator" class="divider"></li>	
						<li>
							<a href="#population" class="page-scroll">@lang('text.nav.population')<img src="assets/user/images/population.png" alt="" title=""/></a>
						</li>	
						<li role="separator" class="divider"></li>
						<li>
							<a href="#rate" class="page-scroll">@lang('text.nav.rate')<img src="assets/user/images/money.png" alt="" title=""/></a>
						</li>
						<li role="separator" class="divider"></li>						
				    </ul>
				</li>
				<li>
					<a href="#draw" class="page-scroll">@lang('text.nav.drawchart')</a>
				</li>
				<li>
					<a href="#collection" class="page-scroll">@lang('text.nav.collection')</a>
				</li>
				<li>
					<a href="#contact" class="page-scroll">@lang('text.nav.contact')</a>
				</li>
				<li class="lang dropdown">
				    <a class="dropdown-toggle" id="language" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    	<span>{{trans('messages.language')}}</span>
				        <div class="btn-dropdown"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
				    </a>
				    <ul class="drop-language dropdown-menu" aria-labelledby="language">
			    	<?php $locales = config('app.locales'); ?>
                        @foreach($locales as $locale)
                            <li><a href="{{route('locale', ['locale' => $locale])}}" @if(trans('messages.language') == __('text.language_'.$locale)) class="active" @endif>@lang('text.language_'.$locale)<img src="{{ URL::asset('assets/user/images/flag_'.$locale.'.png')}}" alt="" title=""/></a></li>
                            <li role="separator" class="divider"></li>
                        @endforeach
				    </ul>
				</li>
					
				<?php
				     $customer = session('customer');
				?>
				@if ($customer == null)			
				<li class="not_login">
					<button class="btn-header btn1" data-toggle="modal" data-target="#free_register" url_logout = {{route('customer.logout')}}>@lang('text.nav.register')</button>
					<button title="@lang('text.nav.register')" class="btn-header-2" data-toggle="modal" data-target="#free_register">
						<i  class="flaticon-signature"></i>
					</button>
				</li>
				<li class="not_login">
					<button class="btn-header btn2" data-toggle="modal" data-target="#login">@lang('text.nav.login')</button>
					<button title="@lang('text.nav.login')" class="btn-header-2" data-toggle="modal" data-target="#login">
						<i  class="flaticon-log-in"></i>
					</button>
				</li>
				@else
				<li class="do_login dropdown"> 
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="https://robohash.org/{{$customer->name }}.png?set=set4&size=100x100">
						<span class="text">{{$customer->name }}</span>
						<div class="btn-dropdown">
							<i class="fa fa-caret-down" aria-hidden="true"></i>
						</div>
					</a> 
					<ul class="drop-account dropdown-menu"> 
						<li>
							<a id="btn_mycollect" data-url="{{ route('customer.mycollect') }}">@lang('text.nav.my_collection')
								<img src="assets/user/images/bst.png" alt="" title=""/>
							</a> 
						</li>
						<li role="separator" class="divider"></li>
						<li>
							<a href="{{route('customer.logout')}}" id='btn_logout'>@lang('text.logout')
								<img src="assets/user/images/logout.png" alt="" title=""/>
							</a> 
						</li>
						<li role="separator" class="divider"></li>
					</ul> 
				</li>
				@endif								
			</ul>
		</div>
	</div>
</nav>

<!-- modal register -->
<div class="modal fade" id="free_register" tabindex="-1" role="dialog" aria-labelledby="free_register" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">@lang('text.nav.register')</h4>
			</div>
			<form id="frm_register" action="{{route('customer.register')}}" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="modal-body">
					<div id="success_do">
						<strong><span style="color: green;"></span></strong>
					</div>
					<input type="hidden" name="img" value="0"/>
					<div id="name">
						<label id="icon" for="name"><i class="flaticon-social"></i></label>
						<input type="text" name="name" id="name" placeholder="@lang('text.modal.name')"/>
						<strong><span class="help-block"></span></strong>
					</div>
					<div id="email">
						<label id="icon" for="email"><i class="flaticon-envelope-of-white-paper"></i></label>
						<input type="text" name="email" id="email" placeholder="@lang('text.modal.email')"/>
						<strong><span class="help-block"></span></strong>
					</div>
					<div id="password">
						<label id="icon" for="password"><i class="flaticon-padlock"></i></label>
						<input type="password" name="password" id="password" placeholder="@lang('text.modal.pass')"/>
						<strong><span class="help-block"></span></strong>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-custom cus-2" data-dismiss="modal">@lang('text.modal.close')</button>
					<button type="submit" id="btn_register" class="btn btn-custom cus-1">@lang('text.modal.register')</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- modal login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">@lang('text.nav.login')</h4>
			</div>
			<form id="frm_login" action="{{route('customer.login')}}" method="post">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
				<div class="modal-body">
					<div id="success_do">
						<strong><span style="color: green;"></span></strong>
					</div>
					<div id="login_email">
						<label id="icon" for="login_email"><i class="flaticon-envelope-of-white-paper"></i></label>
						<input type="text" name="login_email" placeholder="@lang('text.modal.email')"/>
						<strong><span class="help-block"></span></strong>
					</div>
					<div id="login_password">
						<label id="icon" for="login_password"><i class="flaticon-padlock"></i></label>
						<input type="password" name="login_password" placeholder="@lang('text.modal.pass')"/>
						<strong><span class="help-block"></span></strong>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-custom cus-2" data-dismiss="modal">@lang('text.modal.close')</button>
					<button type="submit" id="btn_login" class="btn btn-custom cus-1">@lang('text.modal.login')</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="modal_mycollect" tabindex="-1" role="dialog" aria-labelledby="modal-collection" aria-hidden="true" class="modal fade">
    
</div>


