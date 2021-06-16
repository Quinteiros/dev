@extends('layouts.frontend')

@section('meta')
    @includeIf('cms::meta-data')
@endsection

@hasSection('breadcrumbs')
    @includeIf('theme::breadcrumbs')
@endif

@push('top-scripts')
@endpush

@push('bottom-scripts')
@endpush