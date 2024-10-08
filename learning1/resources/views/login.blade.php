<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/">
        @csrf
        <input type="text" name="name" placeholder="Enter your name" />
        <input type="password" name="password" placeholder="Enter your password" />
        <input type="submit" value="Login" />
    </form>
</body>
</html>