@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.type')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            {!! Breadcrumbs::render('type') !!}
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="content">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h6 class="panel-title">@lang('text.hdr.list_type')</h6>
                <div class="heading-elements">
                    <a class="btn bg-teal-700 btn-icon heading-btn" href="{{ URL::route('admin.type.create') }}"><i class="icon-plus2 position-left"></i><b>@lang('text.btn.add')</b></a>
                </div>
            </div>
            @include('admin.partials.type.table')
        </div>
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/tables/datatables/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/datatables_basic.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
    <!-- /theme JS files -->
@stop