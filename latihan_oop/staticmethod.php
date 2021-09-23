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
    class Greeting{
        public static function welcome(){
            echo "Hello world";
        }

        public function __construct(){
            self::welcome();
        }
    }

    // calling static method from other class
    // class SomeOtherClass{
    //     public function message(){
    //         Greeting::welcome();
    //     }
    // }

   new Greeting();


    ?>
    
</body>
</html>