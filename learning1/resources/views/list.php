<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Color Are: </p>
    <p>
        <?php
        $colors=array("Red","Green","Blue","Pink");
        foreach($colors as $color){
            echo "<li> $color </li>";
        }
        
        ?>
    </p>
    <p>
        <?php
        $students=array(
            "Sachin",
            "Bhanu",
            "Rahul",
            "Rohan",
            "Ronaldo",
            "Messi"
        )
        ?>

        fore
    </p>
</body>
</html>