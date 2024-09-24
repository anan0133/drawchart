@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.faq')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            {!! Breadcrumbs::render('edit_faq', $faq->id) !!}
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="col-md-offset-2">
        <div class="content">
            <div class="panel panel-white col-md-8">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        @lang('text.hdr.edit_faq')
                    </h6>
                </div>
                <div class="panel-body">
                    @include('admin.partials.faq.model')
                </div>
            </div>
        </div>
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/tags/tokenfield.min.js') }}"></script>
    
    <!-- Core JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/uploaders/fileinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/uploader_bootstrap.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/form_select2.js') }}"></script>
	<!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
	<!-- /theme JS files -->
   
    <!-- /theme JS files -->
@stop