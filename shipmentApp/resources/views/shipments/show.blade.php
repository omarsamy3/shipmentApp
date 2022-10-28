@extends('layout')

@section('title', $shipment->code)

@section('content')
    <div class="shipment-item">
                <div class="shipment-image">
                    <img src="{{ asset('images/post') }}" alt="Shipment Image">
                </div>
            <h1><b>Shipment No.</b>{{$shipment->code}}</h1>
            <p><b> Status:</b>
                <select name="status" id="status">
                @if ( $shipment->status == 'done')
                    <option value="done">Done</option>
                @else
                    <option value="progress">In Progress</option>
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                @endif
                </select>
            </p>
            <p><b> Uploaded Date:</b>{{$shipment->created_at}}</p>
            <p><b> Weight:</b> {{$shipment->weight}}</p>
            <p><b> Price:</b>{{$shipment->price}} $</p>
            <p><b> Description</b>{{$shipment->description}}</p>

            {{-- <a href="{{route('shipments.edit', [$shipment])}}">Edit Post</a> --}}

            <form method="POST" action="{{route('shipments.destroy', [$shipment])}}">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit">Delete shipment</button>
                </form>
        </div>
    </div>
@endsection
