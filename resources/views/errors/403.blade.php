@extends('errors.layout')

@section('error')
	<h1>403 - @lang('text.403.forbidden')</h1>

	<p>@lang('text.403.error')</p>

	<p>
		<a href="javascript:history.go(-1)" class="btn btn-style">@lang('text.error.back')</a> 
		<a href="/" class="btn btn-style">@lang('text.error.home')</a>
	</p>
@stop