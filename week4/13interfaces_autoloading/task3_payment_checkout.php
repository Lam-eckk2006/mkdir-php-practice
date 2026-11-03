<?php
interface PaymentMethod
{
    public function processPayment(float $amount): string;
}

class CardPayment implements PaymentMethod
{
    public function processPayment(float $amount): string
    {
        return 'Paid KSh ' . number_format($amount, 2) . ' with card.';
    }
}

class MpesaPayment implements PaymentMethod
{
    public function processPayment(float $amount): string
    {
        return 'Paid KSh ' . number_format($amount, 2) . ' with M-Pesa.';
    }
}

class CashPayment implements PaymentMethod
{
    public function processPayment(float $amount): string
    {
        return 'Paid KSh ' . number_format($amount, 2) . ' in cash.';
    }
}

function checkout(PaymentMethod $method, float $amount): void
{
    echo '<p>' . htmlspecialchars($method->processPayment($amount)) . '</p>';
}

/*
 * Why checkout() needed no change:
 *
 * checkout() depends on the PaymentMethod contract, not on a specific class.
 * CashPayment implements the same processPayment(float): string method, so it
 * satisfies the type hint and can be passed in exactly like CardPayment or
 * MpesaPayment. This is the open/closed idea in practice: add new payment
 * types without editing the checkout logic at all.
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Polymorphism</title>
</head>
<body>
    <h1>Checkout</h1>

    <?php
    checkout(new CardPayment(), 500);
    checkout(new MpesaPayment(), 750);
    checkout(new CashPayment(), 500);
    ?>
</body>
</html>
