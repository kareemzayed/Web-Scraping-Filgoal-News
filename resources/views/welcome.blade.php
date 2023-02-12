<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Filgoal News</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    @foreach ($news as $new)
        <div class="news-item" style="width: 500px; margin-top: 60px; margin-right: 20px">
            <img src="{{ $new['img'] }}" alt="" width="200px">
            <h3>{{ $new['title'] }}</h3>
            <p>{{ $new['body'] }}</p>
        </div>
    @endforeach
</body>

</html>
