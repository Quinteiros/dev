@extends('theme::layouts.master')

@section('header')
    @if(isset($headerImage) && !is_null($headerImage))
        @includeIf('theme::partials.section-header', [$headerImage' => $headerImage])
        @else 
        @includeIf('theme::partials.default-header')
    @endif
@endsection

@section('content')
    @parent
    @if(isset($pageData) && !is_null($pageData))
            @includeIf('cms::page-data', ['pageData' => $pageData])
        @else 
            @includeIf('cms::page-data')
    @endif
    @if(isset($entries) && !is_null($entries)))
        @includeIf('theme::components.default-grid', ['entries' => $entries])
    @endif
@endsection

@push('top-scripts')
@endpush

@push('bottom-scripts')
@endpush