@extends('layouts.app')

@section('content')

@foreach ($notifications as $notification)
    <div class="notification">
        <p>{{ $notification->message }}</p>
        <p>{{ $notification->created_at->diffForHumans() }}</p>


        <p>{{ $notification->notifiable }}</p>
         {{-- @if ($notification->notifiable())
            <p>Notifiable Type: {{ get_class($notification->notifiable()) }}</p>
            <pre>{{ print_r($notification->notifiable, true) }}</pre>
        @else
            <p>No notifiable object found.</p>
        @endif --}}
    </div>
    {{-- kwatts', 'price', 'payment_date', 'is_paid' --}}

    {{-- <p>{{  }}</p> --}}
@endforeach

@endsection