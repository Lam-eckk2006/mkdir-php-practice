<?php
interface Notifier
{
    public function send(string $to, string $msg): string;
}

class EmailNotifier implements Notifier
{
    public function send(string $to, string $msg): string
    {
        return "Email to {$to}: {$msg}";
    }
}

class SmsNotifier implements Notifier
{
    public function send(string $to, string $msg): string
    {
        return "SMS to {$to}: {$msg}";
    }
}

function notifyUser(Notifier $n, string $to, string $msg): void
{
    echo '<p>' . htmlspecialchars($n->send($to, $msg)) . '</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifiers - Interfaces</title>
</head>
<body>
    <h1>Notification contract</h1>

    <?php
    notifyUser(new EmailNotifier(), 'asha@example.test', 'Your order has shipped.');
    notifyUser(new SmsNotifier(), '+254700000000', 'Your OTP is 4821.');
    ?>
</body>
</html>
