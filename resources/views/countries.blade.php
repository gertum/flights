<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Countries</title>
</head>
<body>
<h1>Countries</h1>
<table>
@foreach ($countries as $country)
    <tr>
        <td>{{ $country->id }}</td>
        <td>{{ $country->code }}</td>
        <td>{{ $country->name }}</td>
        <td>{{ $country->coordinates }}</td>
    </tr>
@endforeach
</table>
</body>
</html>