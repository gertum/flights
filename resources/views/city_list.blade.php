<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Cities</title>
</head>
<body>
<h1>Countries</h1>
<table>
    @foreach ($cities as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->code }}</td>
            <td>{{ $city->name }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>