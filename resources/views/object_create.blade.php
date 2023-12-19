@extends('__layout')

@section('content')

    <form action="{{ route("pvz_objects.create")}}" method="POST" enctype='multipart/form-data'>
        @csrf
        <input class="form-control mb-2" type="text" name="title">
        <input class="form-control mb-2" type="text" name="description">
        <input class="form-control mb-2" type="file" name="image">
        <button class="btn btn-primary">Создать</button>
    </form>

@endsection