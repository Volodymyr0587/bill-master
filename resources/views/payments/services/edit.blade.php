@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <div class="mb-2 text-xl font-bold">
                {{ $service->name }} (Edit Payment)
            </div>

            @if (session()->has('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('service.update', $service) }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Name"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name')
                    border-red-500 @enderror"
                        value="{{ $service->name }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="amount" class="sr-only">Amount</label>
                    <input type="number" step=".01" name="amount" id="amount" placeholder="amount"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('amount')
                    border-red-500 @enderror"
                        value="{{ $service->amount }}">

                    @error('amount')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="sr-only">Price</label>
                    <input type="number" step=".01" name="price" id="price" placeholder="price"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('price')
                    border-red-500 @enderror"
                        value="{{ $service->price }}">

                    @error('price')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="payment_date" class="sr-only">Payment date</label>
                    <input type="date" name="payment_date" id="payment_date" placeholder="Payment date"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('payment_date')
                    border-red-500 @enderror"
                        value="{{ Carbon\Carbon::parse($service->payment_date)->format('Y-m-d') }}">

                    @error('payment_date')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center mb-4">
                        <input id="is_paid" type="checkbox" name="is_paid" value="1" {{ $service->is_paid == 1 ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="is_paid" class="ms-2 text-sm font-medium text-gray-900">Is paid</label>
                    </div>

                    @error('is_paid')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                        class="bg-green-900 text-white px-4 py-3 rounded font-medium w-full hover:bg-lime-300 hover:text-green-900">Recalculate</button>
                </div>
            </form>

            <form action="{{ route('service.destroy', $service) }}" method="POST"
                class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')"
                        class="bg-red-900 text-white px-4 py-3 rounded font-medium w-full hover:bg-lime-300 hover:text-green-900">Delete</button>
            </form>
        </div>
    </div>
@endsection
