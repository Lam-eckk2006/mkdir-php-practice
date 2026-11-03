<?php
class Customer
{
    public function __construct(
        public string $name,
        public string $email
    ) {
    }
}

class Order
{
    public function __construct(
        public Customer $customer,
        public array $prices
    ) {
    }

    public function total(): float
    {
        return array_sum($this->prices);
    }

    public function summary(): string
    {
        return "Order for {$this->customer->name} ({$this->customer->email}): KSh "
            . number_format($this->total(), 2);
    }
}

/*
 * Why Order should HAVE A Customer instead of EXTEND it:
 *
 * "Is a" describes inheritance. An Order is not a special kind of Customer,
 * and a Customer is not a special kind of Order - they are different things.
 * An Order HAS A Customer, just like it HAS prices. Composition ("has a")
 * lets one customer own many orders without duplicating their name and email,
 * and it keeps Customer reusable on its own (for example in a profile page).
 * Extending Customer would force every order to become a customer and would
 * make it impossible to reuse the same Customer object for more than one order.
 */
$customer = new Customer('Asha Mwangi', 'asha@example.test');
$order = new Order($customer, [500, 300, 1200]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order and Customer - Composition</title>
</head>
<body>
    <h1>Order summary</h1>
    <p><?php echo htmlspecialchars($order->summary()); ?></p>
    <p>Total: KSh <?php echo number_format($order->total(), 2); ?></p>
</body>
</html>
