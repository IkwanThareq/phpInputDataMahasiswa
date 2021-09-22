<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        class Buah1{
            public $name;
            public $color;

            function __construct($name)
            {
                $this->name = $name;
            }
            // this __destruct method is called when the obj is in the end of script was called 
            function __destruct()
            {
                echo "the fruit is {$this->name}.";
            }
        }
        $apple = new Buah1("Apple");
    ?>
</body>
</html>