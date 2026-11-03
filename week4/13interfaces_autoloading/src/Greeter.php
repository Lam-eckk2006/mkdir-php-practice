<?php
namespace App;

class Greeter
{
    public function greet(string $name): string
    {
        return "Hello, {$name}! This class was autoloaded from src/Greeter.php.";
    }
}
