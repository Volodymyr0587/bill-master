@extends('layouts.app')

@section('content')
    {{-- <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Home
        </div>
        <div>
            <a href="{{ route('electricity') }}">Electricty</a>
        </div>


    </div> --}}

    <x-services />
@endsection
