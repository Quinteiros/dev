@extends('$LOWER_NAME::layouts.setup')
@section('content')
    <h1 class="h1">{{ __('Theme Parameters Grid') }}</h1>
    @if(isset($parameters) && !is_null($parameters))
	    @includeIf('theme::partials.$parameters-grid', ['$parameters' => $parameters])
    @endif
@endsection