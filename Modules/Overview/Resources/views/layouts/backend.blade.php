@extends('layouts.backend')

@section('header')
    @if(isset($headerImage) && !is_null($headerImage))
        @component('theme::defaults.backend-header')@endcomponent
    @endif
@endsection

@section('content')
    @parent
    @component('theme::defaults.entries-table')@endcomponent
@endsection

@push('top-scripts')
@endpush

@push('bottom-scripts')
@endpush