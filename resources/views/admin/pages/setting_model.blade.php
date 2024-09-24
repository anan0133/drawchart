@extends('admin.layouts.master')
@section('content')
	<!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.setting')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            {!! Breadcrumbs::render('edit_setting', $setting->id) !!}
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="col-md-offset-2">
        <div class="content">
            <div class="panel panel-white col-md-8">
                <div class="panel-heading">
                    <h6 class="panel-title">@lang('text.hdr.edit_setting')</h6>
                </div>
                <div class="panel-body">
                    @include('admin.partials.setting.model')
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