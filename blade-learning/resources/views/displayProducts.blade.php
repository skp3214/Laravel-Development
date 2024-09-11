<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .product {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        h3 {
            margin: 10px 0;
            font-size: 18px;
        }
    </style>
</head>
<body>
    @foreach ($products as $item)
    <div class="product">
        <h3>Type: {{$item['type']}}</h3>
        <h3>Brand: {{$item['brand']}}</h3>
        <img src="{{$item['image']}}" alt="Image of {{$item['type']}}">
    </div>
    @endforeach
</body>
</html>
