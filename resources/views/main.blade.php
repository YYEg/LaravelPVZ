@extends('__layout')

@section('content')
    

<div class="row">
    @foreach ($objects as $object)
        <div class="col-4 p-2" style="height: 100%;">
            <div class="d-flex flex-column border p-2" style="height: 100%;">
                <img src="{{$object -> image }}" alt="" style="width: 256px; height: 256px; object-fit: cover;">
                <a href="{{ route("pvz_objects", $object->id)}}" class="btn btn-success w-100 mt-3">
                    {{$object -> title}}
                </a> 
            </div>
            <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-warning">Image</button>
                <button class="btn btn-warning">Description</button>
                <a href="{{ route("pvz_objects.edit", $object->id)}}" class="btn btn-success">EDIT</a>
            </div>
        </div>
    @endforeach    
</div>


@endsection