<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container mx-auto p-10">
        <hr>
        <div class="p-10">
            <h1 class="leading-9 italic">API muestra los Usuarios con sus posts según Media</h1>
            <a class="underline text-red-600" href="api/users">https://localhost/api/users</a>
        </div>
        <hr>
        <div class="p-10">
            <h1 class="leading-9 italic">API muestra los posts Top de cada usuario</h1>
            <a class="underline text-red-600" href="api/posts/top">https://localhost/api/posts/top</a>
        </div>
        <hr>
        <div class="p-10">
            <h1 class="leading-9 italic">API muestra el post requerido por su ID</h1>
            <a class="underline text-red-600" href="api/posts/{id}">https://localhost/api/post/{id}</a>
        </div>
        <hr>
    </div> 
</body>
</html>