@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <div class="mb-2 text-xl font-bold">
                Electricity
            </div>

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('electricity') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="kwatts" class="sr-only">kWatts</label>
                    <input type="text" name="kwatts" id="kwatts" placeholder="kWatts"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('kwatts')
                    border-red-500 @enderror"
                        value="{{ old('kwatts') }}">

                    @error('kwatts')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-green-900 text-white px-4 py-3 rounded font-medium w-full hover:bg-lime-300 hover:text-green-900">Login</button>
                </div>
            </form>


        </div>
    </div>
@endsection
