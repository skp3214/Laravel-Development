<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        li{
            display: flex;
            list-style: none;
        
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column
        }
        h1{
            text-align: center
        }
    </style>
</head>
<body>
    <div>
        <h1>Dynamic News Feed</h1>
        <li>
            <ul><a href="/news/technology">Technology</a></ul>
            <ul><a href="/news/sports">Sports</a></ul>
            <ul><a href="/news/politics">Politics</a></ul>
            <ul><a href="/news/entertainment">Entertainment</a></ul>
        </li>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>
