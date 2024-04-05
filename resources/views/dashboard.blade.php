@extends('layouts.app')

@section('content')

<div class="mx-20">

     <table
      class="min-w-full text-left text-sm font-light text-surface">
      <thead
        class="border-b border-neutral-200 font-medium">
        <tr>
          <th scope="col" class="px-6 py-4">Name</th>
          <th scope="col" class="px-6 py-4">Link</th>
        </tr>
      </thead>
      <tbody>
            <tr class="border-b border-neutral-200">
              <td class="whitespace-nowrap px-6 py-4 font-medium">Electricity</td>
              <td class="whitespace-nowrap px-6 py-4">
                  <a href="{{ route('electricity.show') }}">Detail</a>
              </td>
            </tr>
            @forelse(App\Models\Service::selectRaw('MIN(id) as id, name')->groupBy('name')->get(); as $service)
              <tr>
                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $service->name }}</td>
                <td class="whitespace-nowrap px-6 py-4">
                    <a href="{{ route('service.show') }}">Detail</a>
                </td>
              </tr>
            @empty

            @endforelse


      </tbody>
    </table>

</div>


@endsection
