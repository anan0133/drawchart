@extends('admin.layouts.master')
@section('content')
	<!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.dashboard')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                  <li class="active"><i class="icon-home2 position-left"></i>@lang('text.hdr.dashboard')</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="content">       
        <div class="row">
            <div class="col-md-8">
                <!-- FAQs -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="no-padding no-margin"><h4 class="panel-title text-bold text-teal">@lang('text.hdr.new_faq')</h4></legend>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><b>@lang('text.lbl.name')</b></th>
                                    <th class="col-md-3"><b>@lang('text.lbl.email')</b></th>
                                    <th class="col-md-4"><b>@lang('text.lbl.content')</b></th>
                                </tr>
                            </thead>
                            <tbody class="">  
                            @foreach( $faq_list as $index => $faq)                                       
                                <tr>
                                    <td>
                                        <div class="media-left media-middle">
                                            <a href="{{route('admin.faq.edit', $faq->id)}}"><img src="https://robohash.org/{{$faq->name}}.png?set=set4&size=40x40" class="" alt=""></a>
                                        </div>
                                        <div class="media-left">
                                            <div class=""><a href="{{route('admin.faq.edit', $faq->id)}}" class="text-bold text-teal">{{ $faq->name }}</a></div>
                                            <div class="text-muted text-size-small">
                                                <i class="icon-alarm-add"></i> 
                                                {{ Date::Format($faq->created_at) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="">{{ $faq->email }}</span></td>
                                    <td><span class="text-success-600">{{ str_limit($faq["content"], $limit = 50, $end = '...') }}</span></td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                  <!-- Chart list-->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="no-padding no-margin"><h4 class="panel-title text-bold text-teal">@lang('text.hdr.new_chart')</h4></legend>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach( $chart_list as $index => $chart)
                                <div class="col-md-6 col-lg-6"> 
                                    <div class="category-content border-lg border-teal panel" style="height: 130px">          
                                       <ul class="media-list">
                                            <li class="media stack-media-on-mobile">
                                                <div class="media-left">
                                                    <div class="thumb">
                                                        <a href="{{route('admin.chart.edit', $chart->id)}}">
                                                            <img src="{{$chart->thumbnail}}" class=" img-rounded media-preview" alt="" style="width: 100px">
                                                            <span class="zoom-image"><i class="icon-link"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <legend class="media-heading text-teal text-bold">{{ $chart->title }}</legend>
                                                    <a class="">{{ $chart->user->name }}</a>
                                                    <ul class="list-inline list-inline-separate text-muted mb-5">
                                                        <li><i class="icon-alarm-add"></i> {{ Date::FormatHtml5($chart->created_at) }}</li>                
                                                    </ul>
                                                    
                                                </div>
                                            </li>                                
                                        </ul>
                                    </div>
                                </div>   
                            @endforeach                 
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-4">
                <!-- User list -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <legend class="no-padding no-margin"><h4 class="panel-title text-bold text-teal">@lang('text.hdr.new_user')</h4></legend>
                        <div class="heading-elements">
                            <ul class="icons-list">
                                <li><a data-action="collapse"></a></li>
                                <li><a data-action="close"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                             @foreach( $user_list as $index => $user)
                                <div class="category-content border-lg border-teal panel">          
                                   <ul class="media-list">
                                        <li class="media stack-media-on-mobile">
                                            <div class="media-left">
                                                <div class="thumb">
                                                    <a href="{{route('admin.user.edit', $user->id)}}">
                                                        <img src="https://robohash.org/{{$user->name}}.png?set=set4&size=50x50" class="img-responsive img-rounded media-preview img-circle" alt="">
                                                        <span class="zoom-image"><i class="icon-link"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <legend class="media-heading text-teal text-bold no-padding">{{ $user->name }}</legend><!-- <h6 class="media-heading text-teal text-bold no-margin">Name: {{ $user->name }}</h6> -->
                                                <a class="">{{ $user->email }}</a>
                                                <ul class="list-inline list-inline-separate text-muted mb-5">
                                                    <li><i class="icon-alarm-add"></i> {{ Date::FormatHtml5($user->created_at) }}</li>                
                                                </ul>
                                                
                                            </div>
                                        </li>                                
                                    </ul>
                                </div>
                            @endforeach                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
	<!-- /theme JS files -->
@stop