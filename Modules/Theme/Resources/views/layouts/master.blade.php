@extends('layouts.frontend')

@push('top-scripts')
@endpush

@section('meta')
    @component('core::layouts.components.metadata')
@endsection

@hasSection('breadcrumbs')
    BREADCRUMBS
@endif

@push('bottom-scripts')
@endpush