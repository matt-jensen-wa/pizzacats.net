@extends('layouts.app')

@section('content')

<!-- Meow meow meow -->
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
                {{ __('app.name') }}
        </div>
        <!-- Meow -->
        <div class="links">
            <a href="{{route('meow')}}">Meow</a>
            <a href="{{route('meow.meow')}}">Meow</a>
            <a href="{{route('meow.meow.meow')}}">Meow</a>
        </div>
    </div>
</div>
@endsection
