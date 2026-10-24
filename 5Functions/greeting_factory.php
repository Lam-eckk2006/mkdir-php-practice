<?php

// Task 3: Greeting factory

function greet($name, $title = '') {
    if ($title === '') {
        return 'Hello, ' . $name;
    }
    return 'Hello, ' . $title . ' ' . $name;
}

/**
 * Return the text converted to uppercase
 */
function shout($text) {
    return strtoupper($text);
}

// Calling greet() with different names (no title)
echo greet('John') . "<br>";
echo greet('Amina') . "<br>";
echo greet('Kamau') . "<br>";

echo "<hr>";

// Calling greet() with and without title to prove default works
echo greet('Amina', 'Dr') . "<br>";
echo greet('Otieno', 'Prof') . "<br>";

echo "<hr>";

// Using shout()
echo shout('hello there!') . "<br>";
echo shout(greet('Amina', 'Dr')) . "<br>";
