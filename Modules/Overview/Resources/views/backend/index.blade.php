@extends('overview::layouts.backend')
@section('content')
    <h1 class="h1">{{ __('Overview Entries Grid for the Backend welcome page') }}</h1>
    @if(isset($entries) && !is_null($entries))
	@includeIf('theme::partials.entries-grid', ['entries' => $entries])
    @endif
@endsection
