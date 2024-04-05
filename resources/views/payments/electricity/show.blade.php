@extends('layouts.app')

@section('content')

<div class="mx-20 space-y-10">

    <x-message />

     <table
      class="min-w-full text-left text-sm font-light text-surface">
      <thead
        class="border-b border-neutral-200 font-medium">
        <tr>
          <th scope="col" class="px-6 py-4">KW*</th>
          <th scope="col" class="px-6 py-4">Price 1KW</th>
          <th scope="col" class="px-6 py-4">Total Price</th>
          <th scope="col" class="px-6 py-4">Payment Date</th>
          <th scope="col" class="px-6 py-4">Payment Time</th>
          <th scope="col" class="px-6 py-4">Status</th>
          <th scope="col" class="px-6 py-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($electricity as $elect)
            <tr class="border-b border-neutral-200">
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $elect->kwatts }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $elect->price }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $elect->kwatts * $elect->price }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $elect->payment_date->toDateString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $elect->created_at->toTimeString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $elect->is_paid ? 'PAID' : 'NOT PAID' }}</td>
              <td class="whitespace-nowrap px-6 py-4 text-green-600 hover:underline"><a href="{{ route('electricity.edit', $elect) }}">Edit</a></th>
            </tr>
        @endforeach
      </tbody>
    </table>
    <div class="border-b border-neutral-200">
          <p>* KW - kilowatt  </p>
    </div>

    <div class="mt-4">
        {{ $electricity->links() }}
    </div>
</div>


@endsection
