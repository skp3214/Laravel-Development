<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($discount>=0 && $discount<=50){
        echo "The final price after discount is: $discountedPrice";
    }
    echo "Invalid discount. No discount applied. The Price remains: 600";
    ?>
</body>
</html>