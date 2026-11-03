<?php

/**
 * Refactor of 5Functions/money_helpers.php.
 *
 * Before: an array of prices plus three standalone functions.
 * After: the data and behaviour live together in the Invoice class.
 * The printed output is identical to the original script.
 */
class Invoice
{
    private float $vatRate;

    public function __construct(
        private array $prices,
        float $vatRate = 0.16
    ) {
        $this->vatRate = $vatRate;
    }

    public function netTotal(): float
    {
        return array_sum($this->prices);
    }

    public function applyVat(float $amount): float
    {
        return $amount * (1 + $this->vatRate);
    }

    public static function format(float $amount): string
    {
        return number_format($amount, 2) . ' KSh';
    }
}

$invoice = new Invoice([500, 300, 1200]);
$amount = 1500;

echo "Formatted amount: " . Invoice::format($amount) . "<br>";
echo "Amount after VAT (16%): " . Invoice::format($invoice->applyVat($amount)) . "<br>";
echo "Net total of items: " . Invoice::format($invoice->netTotal()) . "<br>";
