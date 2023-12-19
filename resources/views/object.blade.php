@extends('__layout')

@section('content')

    <h1>{{$object->title}}</h1>
    <div>
        <a href="/pvz_objects/{{$object->id}}?show=image"  @class(["btn", "me-2", "btn-success" => $is_image, "btn-link"
            => !$is_image])
            >
            Картинка
        </a>
        <a href="/pvz_objects/{{$object->id}}?show=info" @class(["btn", "me-2", "btn-success" => $is_info, "btn-link"
            => !$is_info])
            >
            Описание
        </a>
    </div>
    <div class="mt-2">
        @if ($is_image)
            <img src="{{$object->image}}" alt="" style="max-width: 100%; height: 400px">
         @elseif ($is_info)
            {{ $object->info }}
        @else
            Выбирайте, что хотите смотреть
        @endif
    </div>
@endsection