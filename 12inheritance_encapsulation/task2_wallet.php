<?php
class Wallet
{
    private float $balance;

    public function __construct(float $balance = 0)
    {
        if ($balance < 0) {
            throw new InvalidArgumentException('Opening balance cannot be negative.');
        }
        $this->balance = $balance;
    }

    public function deposit(float $amount): void
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Deposit must be greater than zero.');
        }
        $this->balance += $amount;
    }

    public function withdraw(float $amount): bool
    {
        if ($amount <= 0) {
            throw new InvalidArgumentException('Withdrawal must be greater than zero.');
        }

        if ($amount > $this->balance) {
            return false;
        }

        $this->balance -= $amount;
        return true;
    }

    public function getBalance(): float
    {
        return $this->balance;
    }
}

$wallet = new Wallet(500);
$wallet->deposit(250);
$withdrew = $wallet->withdraw(200);
$refused = $wallet->withdraw(9999);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wallet - Encapsulation</title>
    <style>
        .error { color: #b00020; }
        code { background: #f3f3f3; padding: 2px 4px; }
    </style>
</head>
<body>
    <h1>Wallet</h1>

    <p>Opening balance: KSh 500.00</p>
    <p>Deposit KSh 250.00 &rarr; balance: KSh <?php echo number_format($wallet->getBalance(), 2); ?></p>
    <p>Withdraw KSh 200.00 &rarr; <?php echo $withdrew ? 'approved' : 'refused'; ?>, balance: KSh <?php echo number_format($wallet->getBalance(), 2); ?></p>
    <p>Withdraw KSh 9,999.00 &rarr; <?php echo $refused ? 'approved' : 'refused'; ?>, balance: KSh <?php echo number_format($wallet->getBalance(), 2); ?></p>

    <h2>Proof that the balance is protected</h2>
    <p>Trying to assign <code>$wallet->balance = 1000000;</code> from outside the class:</p>
    <?php
    try {
        $wallet->balance = 1000000;
        echo '<p class="error">The assignment succeeded - the balance was not protected.</p>';
    } catch (Error $e) {
        echo '<p class="error">Blocked: ' . htmlspecialchars($e->getMessage()) . '</p>';
        echo '<p>All changes must go through <code>deposit()</code>, <code>withdraw()</code> or the constructor, so the invariant "balance never goes below zero" holds.</p>';
    }
    ?>
</body>
</html>
