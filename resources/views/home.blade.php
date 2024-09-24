@extends('user.layouts.master')

@section('content')
<!-- Header -->
<?php $name_locale = 'name'.'_'.App::getLocale(); ?>
<section class="banner">
	@if(1==2)
		<div style="height: 100%" id="banner_Chart"></div>
	@else
		<div class="myslider">
		@foreach ($slide as $item)
			<div class="item">
				<div class="slider-wapper"><img src="{{ $item['thumbnail'] }}" alt="$item['title']"/>
				  	<div class="slider-content">
				  		<div class="content">
					    	<div class="info">
					      		<h2 class="title-slider">{{ $item['title'] }}</h2>
					      		<h5 class="subtitle-slider">@lang('text.nav.banner_info')</h5>
					    	</div>
						</div>
				  	</div>
				</div>			
			</div>
		@endforeach
		</div>		
	@endif
</section>

<!-- Weather Section -->
<section id="weather-wrapper" class="wow bounceInUp">
	<div class="opacity-bg">
	<h2 class="section-heading">@lang('text.weather.title')</h2>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="wrapper">
				    <search>
						<form>
							<input class='searchbar transparent' id='search' type='text' placeholder='@lang('text.weather.plh.name')' />
							<input class='button transparent' id='button' type="submit" value='@lang('text.weather.btn')' />
						</form>
				    </search>
				    <div class='panel'>
				      	<h2 class='city' id='city'></h2>
				      	<div class='weather' id='weather'>
				        	<div class='group secondary'>
				          		<h4 id='dt'></h4>
				          		<h4 id='description'></h4>
				        	</div>
				        	<div class='group secondary'>
				          		<h4 id='wind'></h4>
				          		<h4 id='humidity'></h4>
				        		</div>
				        	<div class='temperature' id='temperature'>
					          	<h1 class='temp' id='temp'>
					          		<i id='condition'></i> 
					          		<span id='num'></span>
					          		<a class='fahrenheit active' id='fahrenheit' href="#">&deg;F</a>
					          		<span class='divider secondary'>|</span>
					          		<a class='celsius' id='celsius' href="#">&deg;C</a>
					          	</h1>
				        	</div>
				        	<div class='forecast' id='forecast'></div>
				      	</div>
				    </div>
			  	</div>
			</div>	
			<div class="col-md-7">
				<div id="container_weatherChart">
					<canvas id="weatherChart" height:40vh; width:80vw></canvas>
				</div>
			</div>
		</div>
	</div>	  	
</section>

<!-- GDP Section -->
<section id="gdp" class="wow bounceInUp padding-top1">
	<div class="container-fluid">
		<h2 class="section-heading">@lang('text.gdp.title')</h2>
		<div class="row">
			<div class="col-md-4">
				<search>
					<div class="gdp-guide">
						<span>@lang('text.gdp.select')</span>
						<select id='gdp_year'>
						@for($i=1960; $i<2016; $i++)
						<option>{{$i}}</option>
						@endfor
						<option selected>2016</option>
						</select>
					</div>
					<input class='gdp_input' id='gdp_name' type='text' placeholder='@lang('text.popula.plh.name')' value="Vietnam" />
					<input class='gdp_btn' id='btn_gdp' value='@lang('text.popula.btn')' />
				</search>
			</div>
			<div class="col-md-8">
				<div class="chart" id="gdp_line_Chart" style="height:130px;"></div>
			</div>
		</div>		
	</div>	
	<div id="container_gdpChart">
			<div class="chart has-fixed-height" id="gdp_Chart"></div>
		</div>
</section>

<!-- Population Section -->
<section id="population" class="container-fluid wow bounceInUp padding-top1 padding-bottom1">
	<img class="img_rate" src="assets/user/images/population-bg.jpg" alt=""/>
	<div class="">
		<h2 class="section-heading">@lang('text.popula.title')</h2>
		<search>
			<form>
				<input class='population_input' id='searchName' type='text' placeholder='@lang('text.popula.plh.name')' value="Vietnam" />
				<input class='population_input' id='searchYear' type='text' placeholder='@lang('text.popula.plh.year')' value="2017" />
				<input class='population_btn' id='btn_calculate' type='submit' value='@lang('text.popula.btn')' />

			</form>
		</search>			
		<div id="container_populaChart">
			<div class="chart" id="population_Chart" style="height: 400px"></div>
		</div>
	</div>	
</section>


<!-- Rate Section -->
<section id="rate" class="wow bounceInUp padding-top1 padding-bottom1">
	<img class="img_rate" src="assets/user/images/rate-bg.jpg" alt=""/>
	<div class="container-fluid">
		<h2 class="section-heading">@lang('text.rate.title')</h2>
		<div class="row">
			<div class="col-md-4">
				<div class="search">
					<h4>CURRENCY WITH CHART</h4>
					<search>
						<form>
							<div class="choose_code">
								<span>@lang('text.rate.guide')</span>
								<select></select>
								<span class="border-select"></span>
							</div>				
						</form>
				    </search>
				    <input class='rate_btn' id='btn_rate' type='submit' value='@lang('text.rate.btn')' /> 
				</div>
			    <div class="convert">
			    	<h4>CURRENCY EXCHANGE</h4>
					<div class="convert-content">
						<div id="base_wrapper">
							<select name="base" class="currencies" id="base"></select>
							<input type="number" name="curr1" min="0" id="curr1" placeholder='0' step='.1'>
						</div>
						<button id="swap">
							<i class="fa fa-2x fa-exchange" aria-hidden="true"></i>
						</button>
						<div id="target_wrapper">
							<select name="target" class="currencies" id="target"></select>
							<input type="number" name="curr2" min="0" id="curr2" placeholder='0' disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="result_search">
					<div class="chart has-fixed-height" id="basic_lines">
						<h4>@lang('text.rate.hints')</h4>
					</div>
			    </div>
			</div>
		</div>    	
	</div>
</section>

<section id="draw" class="wow bounceInUp padding-top1">
	<h2 class="section-heading">@lang('text.draw.title')</h2>
	<div class="step-wrapper">
		<div class="step-before"></div>
		<ul role="tablist" class="nav nav-tabs">
            <li role="presentation" class="tab-btn-wrapper active" >
                <a href="#choose" id="step01" aria-controls="choose" role="tab" data-toggle="tab" class="tab-btn">
                    <div class="step-img">
						<img src="assets/user/images/step/b1.png" alt=""/>
					</div>
					<div class="step-info">@lang('text.draw.step') 1<br>@lang('text.draw.step1')</div>
                </a>
            </li>
            <li role="presentation" class="tab-btn-wrapper" id="step2">
                <a href="#import" id="step02" aria-controls="import" role="tab" data-toggle="tab" class="tab-btn">
                    <div class="step-img">
						<img src="assets/user/images/step/b2.png" alt=""/>
					</div>
					<div class="step-info">@lang('text.draw.step') 2<br>@lang('text.draw.step2')</div>
                </a>
            </li>
            <li role="presentation" class="tab-btn-wrapper" id="step3">
                <a href="#container_chart" id="step03" aria-controls="container_chart" role="tab" data-toggle="tab" class="tab-btn">
                    <div class="step-img">
						<img src="assets/user/images/step/b3.png" alt=""/>
					</div>
					<div class="step-info">@lang('text.draw.step') 3<br>@lang('text.draw.step3')</div>
                </a>
            </li>            
        </ul>
        <div class="step-after"></div>
	</div>
	<div class="draw-content">
        <div class="tab-content">           
            <div role="tabpanel" class="choose tab-pane fade in active" id="choose">		
				<div class="content-step1">
					<div class="isotope-nav">
					  	<div class="button-group">
					    	<button data-filter=".all" class="button-iso active nexttab">All</button>
					    	@foreach ($list_parent as $item)
					    	<button data-filter=".{{$item->id}}" class="button-iso nexttab">{{$item->$name_locale}}</button>
					    	@endforeach
					  	</div>
					</div>
					<div class="grid-wrapper">
					  	<div class="grid-topic">
					  		@foreach ($type as $item)
					  		<a href="#import">
							    <div class="grid-item all {{$item->parent_id}}" url="{{route('customer.getform',$item->id)}}" type-form="{{$item->parent->key}}">
							    	<div class="hovereffect">
							    		<div class="img-hover" >
							    			<img  src="{{$item->thumbnail}}" alt="{{$item->$name_locale}}"/>
							    		</div>
							    		<div class="overlay">
							    			<img src="assets/user/images/add.png" alt=""/>
							    		</div>				    		
							    	</div>
							    	<div class="img-info">
							    		{{$item->$name_locale}}
							    	</div>
							    </div>
						    </a>
						    @endforeach
					  	</div>
					</div>
				</div>
			</div>		   
            <div role="tabpanel" id="import" class="tab-pane fade">				
				<input  type="hidden" value="" id="type_form">
				<div class="content-step2">
					<div class="warning-step">
						<h4>@lang('text.draw.warning_step1')</h4>
					</div>					
				</div>
			</div>            
             <div role="tabpanel" id="container_chart" class="tab-pane fade">
             	<div class="warning-step">
					<h4>@lang('text.draw.warning_step2')</h4>
				</div>
		    	<div class="content-step3">
					<div class="save">
				    	<a  class="btn btn-contact save_btn wow tada" title="Save Chart Image (.png)">
							<i class="fa fa-floppy-o" aria-hidden="true"></i>
							<span>SAVE</span>
						</a>
				    </div>

				    <canvas id="myChart" height:40vh; width:80vw>				    	
				    </canvas>
				   
		    	</div>
			</div>                    
        </div>                
    </div>

</section>

<!-- Collection Section -->
<section id="collection" class="wow bounceInUp padding-top1">
	<h2 class="section-heading">@lang('text.col.title')</h2>		
	<div class="intro">@lang('text.col.info')</div>
	<div class="collection-wrapper wow bounceInUp">
	@foreach ($collec as $item)
		<div class="block-wrapper">
			<div class="block">
				<div class="block-img">
					<img class="img-full" src="{{$item->thumbnail}}" alt=""/>
				</div>
				<div class="block-content">
					{{$item->title}}
				</div>
			</div>
		</div>
	@endforeach	
	</div>
</section>

<!-- Contact Section -->
<section id="contact">
	<img class="img_contact" src="assets/user/images/contact.jpg" alt=""/>
	<div class="container">
		<div class="row">	
			<div class="col-md-4">
				<div class="main-title">
					<div class="title">
						@lang('text.contact.name')
					</div>
					<div class="subtitle">
						@lang('text.contact.fiction')
					</div>
					<div class="info">
						@lang('text.contact.info')
					</div>
				</div>
			</div>		
			<div class="col-md-7 col-md-offset-1 col-xs-12">
				<div class="content">
					<div class="text-center">
						<h2 class="section-heading">@lang('text.contact.title')</h2>
						<h3 class="section-subheading text-muted">@lang('text.contact.encourage')</h3>
					</div>
					<form id="form_send_mail" action="{{route('customer.contact')}}" method="post" id="contactForm" novalidate>
						<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
						<div class="form-group" id="name">
							<input type="text" class="form-control" placeholder="@lang('text.contact.plh.name')" name="name" required data-validation-required-message="@lang('text.contact.er.name')">
							<span class="focus-border"></span>
							<p class="help-block text-danger"></p>
						</div>
						<div class="form-group" id="email">
							<input type="email" class="form-control" placeholder="@lang('text.contact.plh.mail')" name="email" required data-validation-required-message="@lang('text.contact.er.mail')"">
							<span class="focus-border"></span>
							<p class="help-block text-danger"></p>
						</div>							
						<div class="form-group" id="content">
							<textarea class="form-control" placeholder="@lang('text.contact.plh.mess')" id="message" name="content" required data-validation-required-message="@lang('text.contact.plh.mess')"></textarea>
							<span class="focus-border"></span>
							<p class="help-block text-danger"></p>
						</div>
						<div class="text-center" id="btn_send_mail">
							<a class="btn btn-contact wow tada">
								<span class="btn-text" >Send Message</span>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Partner Section -->
<section id="partner">
	<div class="partner-wrapper">
		<div class="item-partner">
			<img src="assets/user/images/partner/bootstrap.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/chartjs.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/echarts.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/css.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/html.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/jquery.png" alt=""/>
		</div>
		<div class="item-partner">
			<img src="assets/user/images/partner/laravel.png" alt=""/>
		</div>		
	</div>
</section>

<!-- Info Section -->
<section id="info-more">
	<div class="info-icon">
		<i class="fa fa-info"></i>
	</div>
	<div class="content-info">
		@lang('text.content-info')
		<a href="#contact">
			@lang('text.contact.title')
		</a>
	</div>
</section>

<!-- Back-top Section -->
<section class="back-top">
	<a href="#top" class="link">
		<i class="fa fa-angle-up"></i>
	</a>
</section>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/echarts-all-3.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts-stat/ecStat.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/dataTool.min.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/china.js"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/map/js/world.js"></script>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=ZUONbpqGBsYGXNIYHicvbAbM"></script>
<script type="text/javascript" src="http://echarts.baidu.com/gallery/vendors/echarts/extension/bmap.min.js"></script>
<script type="text/javascript">
	var dom = document.getElementById("gdp_Chart");
	var dataGDP;
	$.ajax({
        url: 'https://pkgstore.datahub.io/core/gdp/gdp_json/data/5df7c7aef87db387631052c28fd55e94/gdp_json.json',
        dataType: "json",
        type: "GET",
        success: function(data) {
        	dataGDP = data;
        	nameCountry=[];
        	var temp = 'a';
        	for (item in dataGDP) {
        		if(dataGDP[item]['Country Name']!=temp){
        			nameCountry.push(dataGDP[item]['Country Name']);
        			temp=dataGDP[item]['Country Name'];
        		}
			}
	        $( "#gdp_name" ).autocomplete({
	          source: nameCountry
	        });
        	gdpChart = echarts.init(dom);
        	drawGDP();
        	drawLineGDP();
        }
	});
	
   
	option = null;
</script>
@stop


	

	