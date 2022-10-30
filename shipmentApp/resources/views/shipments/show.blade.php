@extends('layout')

@section('title', $shipment->code)

@section('content')
    <div class="shipment-item">
                <div class="shipment-image">
                    <img src="{{ asset($shipment->img_path)}}" alt="Shipment Image">
                </div>
            <h1><b>Shipment No.</b>{{$shipment->code}}</h1>
            <p><b> Status:</b> {{$shipment->status}}</p>
            <p><b> Uploaded Date:</b>{{$shipment->created_at}}</p>
            <p><b> Weight:</b> {{$shipment->weight}} Kg.</p>
            <p><b> Description: </b>{{$shipment->description}}</p>
            <p><b> Price:</b>{{$shipment->price}} $ <br><br>

                {{-- Check if the status is done then the following transactions will be created: --}}
                @if($shipment->status == 'done')
                      1.Debit Cash({{$shipment->price}} $) <br>
                      2.Credit Revenue({{$shipment->price * 0.2}} $) <br>
                      3.Credit Payable({{$shipment->price * 0.8}} $)
                  @endif
            </p>

            <a href="{{route('shipments.edit', [$shipment])}}">Edit Post</a>

            {{-- This form is to delete the shipment with its journal entities. --}}
            <form method="POST" action="{{route('shipments.destroy', [$shipment])}}">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit">Delete shipment</button>
                </form>
        </div>
@endsection
