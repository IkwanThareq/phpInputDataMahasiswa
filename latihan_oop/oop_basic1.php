
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP</title>
</head>
<body>

    <?php
    class Fruit {
        // propertiesnya
        public $name;
        public $color;

        // methods
        function set_name($name) {
            $this->name = $name;
        }

        function get_name(){
            return $this->name;
        }
    }

    $apple = new Fruit();
    $banana = new Fruit();
    $apple->set_name('Apple');
    $banana->set_name('Banana');
    // instanceof untuk memberitahu apakah object ini instace dari si class "Fruit"
    // var_dump($apple instanceof Fruit);

    echo $apple->get_name();
    echo "<br>";
    echo $banana->get_name();

    ?>
    
</body>
</html>