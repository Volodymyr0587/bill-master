@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Dashboard
        </div>

        @foreach ($electricity as $elect)
            {{ $elect['kwatts'] }}
        @endforeach
    </div>
@endsection
