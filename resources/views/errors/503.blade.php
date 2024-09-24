@extends('errors.layout')

@section('errror')
    <h1>503 - @lang('text.503.unavailable')</h1>

    <p>@lang('text.503.error')</p>

    <p>
    	<a href="javascript:history.go(-1)" class="btn btn-style">@lang('text.error.back')</a> 
    	<a href="/" class="btn btn-style">@lang('text.error.home')</a>
    </p>
@stop