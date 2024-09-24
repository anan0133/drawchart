@extends('errors.layout')

@section('error')
    <h1>405 - @lang('text.405.not_allowed')</h1>

    <p>@lang('text.405.error')</p>

    <p>
    	<a href="javascript:history.go(-1)" class="btn btn-style">@lang('text.error.back')</a> 
    	<a href="/" class="btn btn-style">@lang('text.error.home')</a>
    </p>
@stop
