<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div>
        <a href='/' class="me-2">На главную</a>
        @foreach ($types as $type)
            <a href="/?type={{$type->title}}" class="me-2">{{Str::upper($type->title)}}</a>
        @endforeach
        
        <a href="/pvz_objects/create" class="ms-4">Создать</a>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>