@extends('layouts.app')

@section('content')

<div class="mx-20">

    <x-message />

     <table
      class="min-w-full text-left text-sm font-light text-surface">
      <thead
        class="border-b border-neutral-200 font-medium">
        <tr>
          <th scope="col" class="px-6 py-4">kWatts</th>
          <th scope="col" class="px-6 py-4">Price</th>
          <th scope="col" class="px-6 py-4">Payment Date</th>
          <th scope="col" class="px-6 py-4">Payment Time</th>
          <th scope="col" class="px-6 py-4">Is Paid</th>
          <th scope="col" class="px-6 py-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($electricity as $electricity)
            <tr class="border-b border-neutral-200">
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $electricity->kwatts }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $electricity->price }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $electricity->payment_date->toDateString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $electricity->created_at->toTimeString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $electricity->is_paid ? 'PAID' : 'NOT PAID' }}</td>
              <td class="whitespace-nowrap px-6 py-4 text-green-600 hover:underline"><a href="{{ route('electricity.edit', $electricity) }}">Edit</a></th>
            </tr>
        @endforeach
      </tbody>
    </table>

</div>


@endsection
