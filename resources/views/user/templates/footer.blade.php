<footer>
	<div class="footer-content">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="logo-footer">
						<a href="#page-top" class="img-footer"> 
							<img src="{{ $settings['site_logo'] }}"/>
						</a>
					</div>
					<div class="content-footer">
						@lang('text.foot.goal') 
					</div>
					
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="title-footer">
						@lang('text.foot.contact')
					</div>
					<div class="content-contact">
			            <div class="item">
			            	<i class="icons fa fa-map-marker"></i>
			            	<div class="contact-info">
			            		<div class="text">{{ $settings['contact_address'] }}</div>
			            	</div>
			            </div>
			            <div class="item">
			            	<i class="icons fa fa-phone"></i>
			            	<div class="contact-info">
			            		<div class="text">{{ $settings['contact_phone'] }}</div>
			            	</div>
			            </div>
			            <div class="item">
			            	<i class="icons fa fa-envelope"></i>
			            	<div class="contact-info">                    
			            		<div class="text"><a href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a></div>
			                </div>
			            </div>
			            <div class="item">
			            	<i class="icons fa fa-globe"></i>
			            	<div class="contact-info">
			            		<div class="text"><a href="{{ $settings['site_link'] }}">{{ $settings['site_link'] }}</a></div>
			            	</div>
			            </div>        
			        </div>				
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="title-footer">
						@lang('text.foot.social')
					</div>
					<div class="social">
						<a target="_blank" href="{{ $settings['link_facebook_page'] }}" class="link share-facebook">
							<i class="icons fa fa-facebook"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_twitter_page'] }}" class="link share-twitter">
							<i class="icons fa fa-twitter"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_google_page'] }}" class="link share-google-plus">
							<i class="icons fa fa-google-plus"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_youtube_page'] }}" class="link share-youtube">
							<i class="icons fa fa-youtube"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_instagram_page'] }}" class="link share-instagram">
							<i class="icons fa fa-instagram"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_skype_page'] }}" class="link share-skype">
							<i class="icons fa fa-skype"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_slack_page'] }}" class="link share-slack">
							<i class="icons fa fa-slack"></i>
						</a>
						<a target="_blank" href="{{ $settings['link_pinterest_page'] }}" class="link share-pinterest">
							<i class="icons fa fa-pinterest-p"></i>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 footer-bottom text-center">
		<span class="copyright">Copyright &copy; Drawchart 2016</span>
	</div>


	<!-- <input type="text" class="form-control colorpicker-show-input" data-preferred-format="hex" value="#f75d1c"> -->
</footer>
<!-- Global stylesheets -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{ asset('assets/user/js/main.js') }}"></script>
<script src="{{ asset('assets/user/js/chart.js') }}"></script>
<script src="{{ asset('assets/user/js/weather.js') }}"></script>
<script src="{{ asset('assets/user/js/population.js') }}"></script>
<script src="{{ asset('assets/user/js/rates.js') }}"></script>
<script src="{{ URL::asset('assets/admin/js/plugins/notifications/sweet_alert.min.js') }}"></script>
<!-- <script src="{{ asset('assets/user/libs/form_floating_labels.js') }}"></script>	 -->
<!-- /global stylesheets -->

<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('assets/admin/js/plugins/visualization/echarts/echarts.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/core/app.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('assets/admin/js/echarts/lines_areas.js')}}"></script>
<!-- /theme JS files -->
<script src="{{ asset('assets/user/js/gdp.js') }}"></script>

