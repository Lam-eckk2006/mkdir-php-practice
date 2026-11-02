<?php
$defaultText = "The quick brown fox jumps over the lazy dog. "
    . "The dog barks and the fox runs away. "
    . "Quick, quick! The lazy dog sleeps while the fox watches. "
    . "A fox is clever, but the dog is loyal. The end.";

$text = $_POST['text'] ?? $defaultText;
$topWords = [];
$totalWords = 0;
$uniqueWords = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawWords = preg_split('/[^a-z0-9\']+/i', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);

    $counts = [];

    foreach ($rawWords as $word) {
        $word = trim($word, "'");
        if ($word === '') {
            continue;
        }
        $counts[$word] = ($counts[$word] ?? 0) + 1;
    }

    arsort($counts);

    $totalWords = array_sum($counts);
    $uniqueWords = count($counts);
    $topWords = array_slice($counts, 0, 5, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Report</title>
    <style>
        textarea { width: 100%; max-width: 640px; height: 140px; padding: 8px; box-sizing: border-box; }
        table { border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 6px 14px; text-align: left; }
        th { background: #f3f3f3; }
        .muted { color: #666; }
    </style>
</head>
<body>
    <h1>Word Frequency Report</h1>
    <p>Paste a paragraph and the top 5 words will be counted (case-insensitive).</p>

    <form method="post" action="">
        <textarea name="text" id="text"><?php echo htmlspecialchars($text); ?></textarea><br>
        <button type="submit">Analyse text</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <h2>Top 5 words</h2>

        <?php if (empty($topWords)): ?>
            <p class="muted">No words found. Try entering some text.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Rank</th>
                    <th>Word</th>
                    <th>Count</th>
                </tr>
                <?php $rank = 1; ?>
                <?php foreach ($topWords as $word => $count): ?>
                    <tr>
                        <td><?php echo $rank; ?></td>
                        <td><?php echo htmlspecialchars($word); ?></td>
                        <td><?php echo (int) $count; ?></td>
                    </tr>
                    <?php $rank++; ?>
                <?php endforeach; ?>
            </table>

            <p class="muted">
                Total words: <?php echo (int) $totalWords; ?><br>
                Unique words: <?php echo (int) $uniqueWords; ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
