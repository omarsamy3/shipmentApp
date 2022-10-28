@extends('layout')

@section('title', 'Home')


@section('content')
    @forelse ($shipments as $shipment)
        <div class="shipment-item">
            <div class="shipment-content">
                <div class="shipment-image">
                    <img src="{{ asset('images/post')}}" alt="Shipment Image">
                </div>
                <small>Shipment ID: <a href="{{route('shipments.show', [$shipment])}}">{{ $shipment->code}}</a></small>
                <h2>Shipper name: {{$shipment->shiper}}</h2>
                <p>Shipment description: {{$shipment->description}}</p>
                <h3>Shipment status: {{$shipment->status}}</h3>
                <h1>Shipment price: {{$shipment->price}}</h1>

            </div>
        </div>
        {{-- If There is no shipments >> Empty page. >> Go down --}}
        @empty
        <h1 class="emptypage">
            No shipments were Created.
        </h1>
    @endforelse
    @endsection
