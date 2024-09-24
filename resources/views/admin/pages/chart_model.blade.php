@extends('admin.layouts.master')
@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.chart')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            @if($chart->id == null)
                {!! Breadcrumbs::render('create_chart') !!}
            @else
                {!! Breadcrumbs::render('edit_chart', $chart->id) !!}
            @endif
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area-->
    <div class="col-md-offset-2">
        <div class="content">
            <div class="panel panel-white col-md-8">
                <div class="panel-heading">
                    <h6 class="panel-title">
                        @if($chart->id == null)
                            @lang('text.hdr.create_chart')
                        @else
                            @lang('text.hdr.edit_chart')
                        @endif
                    </h6>
                </div>
                <div class="panel-body">
                    @include('admin.partials.chart.model')
                </div>
            </div>
        </div>
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <!--event-->   
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/uploaders/fileinput.min.js') }}"></script>
     <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/switch.min.js') }}"></script>
     
    <!--/event-->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/uploader_bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/form_select2.js') }}"></script>
   
	<script type="text/javascript">
        $(document).ready(function() {
            $(".styled").uniform({
                radioClass: 'choice'
            });
        });
    </script>
    <!-- render ui -->
@stop