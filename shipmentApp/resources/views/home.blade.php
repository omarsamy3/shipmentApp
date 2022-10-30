@extends('layout')

@section('title', 'Home')


@section('content')
    @forelse ($shipments as $shipment)
        <div class="shipment-item">
            <div class="shipment-content">
                <div class="shipment-image">
                    <img src="{{ asset($shipment->img_path)}}" alt="Shipment Image">
                </div>
                <h1><b>Shipment No.</b><a href="{{route('shipments.show', [$shipment])}}">{{$shipment->code}}</a></h1>
            <p><b> Status:</b> {{$shipment->status}}</p>
            <p><b> Uploaded Date:</b>{{$shipment->created_at}}</p>
            <p><b> Weight:</b> {{$shipment->weight}} Kg</p>
            <p><b> Description: </b>{{$shipment->description}}</p>
            <p><b> Price:</b>{{$shipment->price}} $ <br><br>
                @if($shipment->status == 'done')
                      1.Debit Cash({{$shipment->price}} $) <br>
                      2.Credit Revenue({{$shipment->price * 0.2}} $) <br>
                      3.Credit Payable({{$shipment->price * 0.8}} $)
                  @endif
            </p>
            </div>
        </div>

        {{-- If There is no shipments >> Empty page. >> Go down --}}
        @empty
        <h1 class="emptypage">
            No shipments were Created.
        </h1>
    @endforelse
    @endsection
