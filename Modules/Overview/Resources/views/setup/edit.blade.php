@extends('overview::layouts.setup')
@section('content')
    <h1 class="h1">{{ __('Overview Module Parameters Grid') }}</h1>
    <form id="overviewEditSetupFrm" action="{{ route('overview-setup-update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @if(isset($parameters) && !is_null($parameters))
            @foreach($parameters as $parameter)
                <div class="block"> DEFINE LABEL, FIELD, ETC</div>
            @endforeach
        @endif
        @includeIf('theme::defaults.cancel-update-btns')
    </form>
@endsection
