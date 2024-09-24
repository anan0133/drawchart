@extends('errors.layout')

@section('error')
	<h1>404 - @lang('text.404.notfound')</h1>

	<p>@lang('text.404.error')</p>

	<p>
		<a href="javascript:history.go(-1)" class="btn btn-style">@lang('text.error.back')</a> 
		<a href="/" class="btn btn-style">@lang('text.error.home')</a>
	</p>
@stop
