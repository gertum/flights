<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flights management</title>

        @livewireStyles
    </head>
    <body class="antialiased">
       <h1>Flights management system</h1>
       <livewire:counter />
       <ul>
        <li><a href="/home"> nuoroda į namus</a></li>
        <li><a href="/countries"> Šalys</a></li>
        <li><a href="/cities"> Miestai</a></li>
       </ul>
       @livewireScripts
    </body>
</html>
