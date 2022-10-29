@extends('layout')

@section('title', 'Edit Shipment' . $shipment->code)


@section('content')
    <h1>Edit the Shipment</h1>

    <form method="POST" action="{{route('shipments.update', [$shipment])}}">
        @csrf {{--To avoid the security errors.--}}
        @method('PUT')

         {{-- Shipper Name --}}
    <label for="">Shipper</label>
    <input class="@error('shiper') error-border @enderror" type="text" name="shiper" value="{{old('shiper', $shipment->shiper)}}">
    @error('shiper')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Code --}}
    <label for="">Shipment Code</label>
    <input class="@error('code') error-border @enderror" type="text" name="code" value="{{old('code', $shipment->code)}}">
    @error('code')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Weight --}}
    <label for="">Shipment Weight</label>
    <input class="@error('weight') error-border @enderror" type="text" name="weight" value="{{old('weight', $shipment->weight)}}">
    @error('weight')
    <div class="error">
        {{$message}}
    </div>
    @enderror

          {{-- Shipment Description --}}
    <label for="">Shipment Description</label>
    <textarea class="@error('description') error-border @enderror" name="description" >{{old('description', $shipment->description)}}</textarea>
    @error('description')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Image --}}
    <label for="">Shipment Image</label>
    <input type="file" id="myImg" name="img-path" value="{{old('img-path', $shipment->img_path)}}">
    @error('img-path')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    {{-- Shipment Status --}}
    <label class="@error('status') error-border @enderror" for="">Shipment Status</label>
    <select name="status" id="status" value="{{old('status',$shipment->status)}}">
        @if($shipment->status == 'done')
        <option value="done" selected>Done</option>
        @elseif($shipment->status == 'progress')
        <option value="progress" selected>In Progress</option>
        <option value="pending">Pending</option>
        <option value="done">Done</option>
        @else
        <option value="pending" selected>Pending</option>
        <option value="progress">In Progress</option>
        <option value="done">Done</option>
        @endif
    </select>
    @error('status')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    <button type="submit">Update</button>
    </form>

@endsection
