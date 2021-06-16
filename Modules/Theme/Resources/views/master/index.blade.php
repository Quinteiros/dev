@extends('theme::layouts.master')
@section('content')
    <h1 class="h1">{{ __('Theme Entries Grid for the Master Page') }}</h1>
    @if(isset($entries) && !is_null($entries))
    	@includeIf('theme::partials.entries-grid', ['entries' => $entries])
    @endif
@endsection
