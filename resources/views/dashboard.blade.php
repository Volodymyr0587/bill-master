@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
        </div>

        @foreach ($user->electricities as $elect)
            {{ $elect['kwatts'] * $elect['price'] }}
        @endforeach
    </div>
@endsection
