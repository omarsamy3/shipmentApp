@extends('layout')

@section('title', $shipment->code)


@section('content')
    <h1>Create the jouranl entities</h1>

    <form method="POST" action="{{route('journal_entities.store', ['id'=>$shipment])}}">
        @csrf {{--To avoid the security errors.--}}

        <h3>
            -Debit        >>>>          Cash({{$shipment->price}} $)<br>
            -Credit       >>>>          Revenue({{$shipment->price * 0.2}} $)<br>
            -Credit       >>>>          Payable({{$shipment->price * 0.8}} $)<br>
        </h3>

    <button name="submit" type="submit">Submit</button>
    </form>



@endsection
