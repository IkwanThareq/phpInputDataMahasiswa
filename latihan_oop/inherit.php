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

    // class Fruit2{
    //     public $color;
    //     public $name;

    //     public function __construct($name, $color)
    //     {
    //         $this->color = $color;
    //         $this->name = $name;
    //     }
    //     public function intro(){
    //         echo "The fruit is {$this->name} and the color is {$this->color}";
    //     }
    // }

    // class Strawberry extends Fruit2 {
    //     public function messsage(){
    //         echo "Am I fruit or a berry ? ";
    //     }
    // }

    class Fruit2{
        public $color;
        public $name;

        public function __construct($name, $color)
        {
            $this->color = $color;
            $this->name = $name;
        }
        public function intro(){
            echo "The fruit is {$this->name} and the color is {$this->color}";
        }
    }
        // ovverididing inherit method __construct and intro()
    class Strawberry extends Fruit2 {
        public $weight;
        public function __construct($name, $color, $weight)
        {
            $this->name = $name;
            $this->color = $color;
            $this->weight = $weight;
        }
        public function intro(){
            echo "The fruit is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} gram."; 
        }
    }

    $stroberry = new Strawberry("Strawberry", "red", 50);
    $stroberry->intro();

    ?>
    
</body>
</html>