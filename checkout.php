<?php
session_start();

// Calculate total price from cart
$totalPrice = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('cover page.PNG');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .checkout-form {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        .checkout-form h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .checkout-form label {
            font-weight: bold;
        }

        .checkout-form input,
        .checkout-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .checkout-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .checkout-form button:hover {
            background-color: #218838;
        }

        .total-price {
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="checkout-form">
        <h1>Checkout</h1>
        <form method="POST" action="order_summary.php">

            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="Street_Name">Street Name:</label>
            <input type="text" id="Street_Name" name="Street Name" required>

            <label for="Suburb">Suburb:</label>
            <input type="text" id="Suburb" name="Suburb" required>

            <label for="Town">Town:</label>
            <input type="text" id="Town" name="Town" required>

            <label for="Postal_code">Postal Code:</label>
            <input type="text" id="Postal Code" name="Postal_code" required>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="Credit Card">Credit Card</option>
                <option value="PayPal">PayPal</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Cash">Cash</option>
            </select>

            <label for="delivery/collection">Delivery/Collection:</label>
            <select id="delivery/collection" name="delivery/collection" required>
                <option value="delivery">Delivery</option>
                <option value="collection">Collection</option>
            </select>

            <p class="total-price">Total Amount: R<?= number_format($totalPrice, 2) ?></p>

            <button type="submit">Place Order</button>
        </form>
    </div>

</body>

</html>