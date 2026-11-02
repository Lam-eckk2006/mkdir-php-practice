<?php
class Book
{
    public bool $borrowed = false;

    public function __construct(
        public string $title,
        public string $author,
        public int $pages
    ) {
    }

    public function borrow(): void
    {
        $this->borrowed = true;
    }

    public function describe(): string
    {
        $status = $this->borrowed ? 'borrowed' : 'available';
        return "\"{$this->title}\" by {$this->author} ({$this->pages} pages) is {$status}.";
    }
}

$books = [
    new Book('Things Fall Apart', 'Chinua Achebe', 209),
    new Book('The River and the Source', 'Margaret Ogola', 286),
];

$books[0]->borrow();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library Books</title>
</head>
<body>
    <h1>Library</h1>

    <?php foreach ($books as $book): ?>
        <p><?php echo htmlspecialchars($book->describe()); ?></p>
    <?php endforeach; ?>
</body>
</html>
