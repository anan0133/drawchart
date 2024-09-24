@extends('admin.layouts.master')
@section('content')
	<!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.manage_role')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon-home2 position-left"></i> Dashboard</a></li>
                <li>@lang('text.lbl.permission')</li>
                <li class="active">@lang('text.hdr.list_permissions')</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="content">
    	<div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">@lang('text.hdr.list_permissions')</h6>
            </div>
            @include('admin.partials.permission.table')
        </div>
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
@stop