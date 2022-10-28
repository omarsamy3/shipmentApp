@extends('layout')

@section('title', 'Create Shipments')


@section('content')
    <h1>Create a new Shipment</h1>

    <form method="POST" action="{{route('shipments.store')}}">
        @csrf {{--To avoid the security errors.--}}

         {{-- Shipper Name --}}
    <label for="">Shipper</label>
    <input class="@error('shiper') error-border @enderror" type="text" name="shiper" value="{{old('shiper')}}">
    @error('shiper')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Code --}}
    <label for="">Shipment Code</label>
    <input class="@error('code') error-border @enderror" type="text" name="code" value="{{old('code')}}">
    @error('code')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Weight --}}
    <label for="">Shipment Weight</label>
    <input class="@error('weight') error-border @enderror" type="text" name="weight" value="{{old('weight')}}">
    @error('weight')
    <div class="error">
        {{$message}}
    </div>
    @enderror

          {{-- Shipment Description --}}
    <label for="">Shipment Description</label>
    <textarea class="@error('description') error-border @enderror" name="description" >{{old('description')}}</textarea>
    @error('description')
    <div class="error">
        {{$message}}
    </div>
    @enderror

         {{-- Shipment Image --}}
    <label for="">Shipment Image</label>
    <input type="file" id="myImg" name="img-path">
    @error('img-path')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    {{-- Shipment Status --}}
    <label class="@error('status') error-border @enderror" for="">Shipment Status</label>
    <select name="status" id="status">
        <option value="pending">Pending</option>
        <option value="progress">In Progress</option>
        <option value="done">Done</option>
    </select>
    @error('status')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    <button type="submit">Submit</button>
    </form>

@endsection
