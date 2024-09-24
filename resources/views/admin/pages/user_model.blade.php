@extends('admin.layouts.master')
@section('content')
	<!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@lang('text.hdr.user')</span></h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            @if($user->id == null)
                {!! Breadcrumbs::render('create_user') !!}
            @else
                {!! Breadcrumbs::render('edit_user', $user->id) !!}
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
                        @if($user->id == null)
                            @lang('text.hdr.create_user')
                        @else
                            @lang('text.hdr.edit_user')
                        @endif
                    </h6>
                </div>
                <div class="panel-body">
                    @include('admin.partials.user.model')
                </div>
            </div>
        </div>
    </div>
    <!-- /content area-->
@stop
@section('scripts')
    <!-- Core JS files -->
   
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/uploaders/fileinput.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/admin/js/pages/uploader_bootstrap.js') }}"></script>
	<!-- Theme JS files -->
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.min.js') }}"></script>
	<!-- /theme JS files -->
    <script type="text/javascript">
        $(document).ready(function(){
            $(".switch").bootstrapSwitch();
        });
        $(document).on('click', '.content-group [data-action=expend]', function(e) {
            var target = $(this).attr('data-target');
            
            $(this).parents('.panel').toggleClass('panel-collapsed');
            $(this).toggleClass('rotate-180');


            if($(target).is(":visible")) {
                $(target).hide(200);
            } else {
                $(target).show(200);
            }
        });
    </script>
@stop