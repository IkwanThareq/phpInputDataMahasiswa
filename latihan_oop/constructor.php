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

    class Buah{
        public $name;
        public $color;

        function __construct($name, $color)
        {
            $this->nama = $name;
            $this->warna = $color;
        }

        function get_name(){
            return $this->nama;
        }
        function get_color(){
            return $this->warna;
        }
    }

    $apple = new Buah("Apple", " merah");
    echo $apple->get_name();
    echo $apple->get_color();
    ?>
    
</body>
</html>