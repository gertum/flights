<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.css" rel="stylesheet">
    @livewireStyles

    <title>Flights system</title></head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Skrydžių sistema</a>
        <a class="navbar-brand" href="/port">Uostai</a>
        <a class="navbar-brand" href="/flight">Skrydžiai</a>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center mt-3">
        {{ $slot }}
    </div>
</div>

@livewireScripts
</body>
</html>
