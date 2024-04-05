@extends('layouts.app')

@section('content')

<div class="mx-20 space-y-10">

    <x-message />

     <table
      class="min-w-full text-left text-sm font-light text-surface">
      <thead
        class="border-b border-neutral-200 font-medium">
        <tr>
          <th scope="col" class="px-6 py-4">Name</th>
          <th scope="col" class="px-6 py-4">Amount</th>
          <th scope="col" class="px-6 py-4">Price</th>
          <th scope="col" class="px-6 py-4">Total Price</th>
          <th scope="col" class="px-6 py-4">Payment Date</th>
          <th scope="col" class="px-6 py-4">Payment Time</th>
          <th scope="col" class="px-6 py-4">Status</th>
          <th scope="col" class="px-6 py-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($service as $serv)
            <tr class="border-b border-neutral-200">
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $serv->name }}</td>
              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $serv->amount }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $serv->price }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $serv->amount * $serv->price }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $serv->payment_date->toDateString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $serv->created_at->toTimeString() }}</td>
              <td class="whitespace-nowrap px-6 py-4">{{ $serv->is_paid ? 'PAID' : 'NOT PAID' }}</td>
              <td class="whitespace-nowrap px-6 py-4 text-green-600 hover:underline"><a href="{{ route('service.edit', $serv) }}">Edit</a></th>
            </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4">
        {{ $service->links() }}
    </div>
</div>


@endsection
