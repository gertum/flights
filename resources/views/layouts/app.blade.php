<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @livewireStyles
    <title>Flights system</title></head>
<body>

{{ $slot }}

@livewireScripts
</body>
</html>
