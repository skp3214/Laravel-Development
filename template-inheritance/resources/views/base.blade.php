<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul {
            display: flex;
            list-style: none;
            padding: 0;
        }
        li {
            margin: 0 10px;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <div>
        <h1>Dynamic News Feed</h1>
        <ul>
            <li><a href="{{ route('technology') }}">Technology</a></li>
            <li><a href="{{ route('sports') }}">Sports</a></li>
            <li><a href="{{ route('politics') }}">Politics</a></li>
            <li><a href="{{ route('entertainment') }}">Entertainment</a></li>
        </ul>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
