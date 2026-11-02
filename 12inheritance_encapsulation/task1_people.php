<?php
class Person
{
    public function __construct(public string $name)
    {
    }

    public function sayHello(): string
    {
        return "Hello, my name is {$this->name}.";
    }
}

class Student extends Person
{
    public function __construct(string $name, public string $course)
    {
        parent::__construct($name);
    }

    public function sayHello(): string
    {
        return "Hi, I'm {$this->name} and I study {$this->course}.";
    }
}

class Teacher extends Person
{
    public function __construct(string $name, public string $subject)
    {
        parent::__construct($name);
    }

    public function sayHello(): string
    {
        return "Good morning, I'm {$this->name} and I teach {$this->subject}.";
    }
}

$people = [
    new Person('Asha'),
    new Student('Brian', 'Web Development'),
    new Teacher('Mr. Otieno', 'Mathematics'),
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>People - Inheritance</title>
</head>
<body>
    <h1>School</h1>

    <?php foreach ($people as $person): ?>
        <p>
            <?php echo htmlspecialchars($person->sayHello()); ?>
            <small>(<?php echo htmlspecialchars(get_class($person)); ?>, a Person: <?php echo $person instanceof Person ? 'yes' : 'no'; ?>)</small>
        </p>
    <?php endforeach; ?>

    <p>Even though each object has its own class, the loop only assumes <code>Person</code> and calls the overridden <code>sayHello()</code>.</p>
</body>
</html>
