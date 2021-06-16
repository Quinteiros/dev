@extends('theme::layouts.master')

@section('header')
    @if(isset($headerImage) && !is_null($headerImage))
        @includeIf('theme::partials.section-header', ['headerImage' => $headerImage])
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
        @includeIf('theme::components.entries-grid', ['entries' => $entries])
    @endif
@endsection

@push('top-scripts')
@endpush

@push('bottom-scripts')
@endpush