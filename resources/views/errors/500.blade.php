@extends('errors.layout')
@section('error')
    <h1>500 - @lang('text.500.server_error')</h1>

    <p>@lang('text.500.error')</p>

    <p><a href="javascript:history.go(-1)" class="btn btn-style">@lang('text.error.back')</a> <a href="/" class="btn btn-style">@lang('text.error.home')</a></p>
@stop