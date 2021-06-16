@extends('theme::layouts.master')

@section('header')
    @if(isset($headerImage) && !is_null($headerImage)))
        @component('theme::layouts.components.section-header', ['headerImage' => $headerImage])@endcomponent
        @else 
        @component('theme::layouts.components.section-header')@endcomponent
    @endif
@endsection

@section('content')
    @parent
    @if(isset($pageData) && !is_null($pageData))
            @component('cms::page-data', ['pageData' => $pageData])@endcomponent
        @else 
            @component('cms::page-data')@endcomponent
    @endif
    @if(isset($entries) && !is_null($entries)))
        @component('theme::components.grid', ['entries' => $entries])@endcomponent
    @endif
@endsection

@push('top-scripts')
@endpush

@push('bottom-scripts')
@endpush