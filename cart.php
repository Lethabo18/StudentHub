<?php
session_start();

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add to Cart function
function addToCart($name, $price, $quantity, $image) {
    $quantity = max(1, $quantity);

    foreach ($_SESSION['cart'] as &$item) {
        if ($item['name'] === $name) {
            $item['quantity'] += $quantity;
            return;
        }
    }

    $_SESSION['cart'][] = [
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
        'image' => $image
    ];
}

// Handle POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? 0;
    $quantity = $_POST['quantity'] ?? 1;
    $image = $_POST['image'] ?? '';

    if ($action === 'add') {
        addToCart($name, $price, $quantity, $image);
    } elseif ($action === 'update') {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['name'] === $name) {
                $item['quantity'] = max(1, $quantity);
            }
        }
    } elseif ($action === 'remove') {
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($name) {
            return $item['name'] !== $name;
        });
    }
}

// Calculate total price
$totalPrice = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalPrice += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<style>
     /* General Reset */
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            padding: 2rem;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #4caf50;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        thead tr {
            background-color: #4caf50;
            color: white;
        }

        thead th, tbody td {
            text-align: left;
            padding: 1rem;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e8f5e9;
            transition: background-color 0.3s ease;
        }

        img {
            width: 50px;
            border-radius: 4px;
        }

        form {
            display: inline;
        }

        input[type="number"] {
            width: 50px;
            padding: 0.3rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        button {
            padding: 0.5rem 1rem;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #43a047;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(1);
        }

        p {
            margin-top: 1.5rem;
            font-size: 1.2rem;
            font-weight: 500;
            text-align: right;
        }

        .actions {
            text-align: center;
            margin-top: 2rem;
        }

        .actions button {
            margin: 0 0.5rem;
        }

        .empty-message {
            text-align: center;
            font-size: 1.2rem;
            font-weight: 500;
            color: #888;
            padding: 2rem;
        }
    </style>
<body>
    <h1>Shopping Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" width="50"></td>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td>R<?= number_format($item['price'], 2) ?></td>
                    <td><?= htmlspecialchars($item['quantity']) ?></td>
                    <td>R<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                    <td>
                        <!-- Update Quantity -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($item['name']) ?>">
                            <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" min="1">
                            <input type="hidden" name="action" value="update">
                            <button type="submit">Update</button>
                        </form>
                        <!-- Remove Item -->
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="name" value="<?= htmlspecialchars($item['name']) ?>">
                            <input type="hidden" name="action" value="remove">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Your cart is empty.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <p>Total Price: R<?= number_format($totalPrice, 2) ?></p>
    <button onclick="window.location.href='products.php'">Add more products</button>
    <button onclick="window.location.href='checkout.php'">Checkout</button>
</body>
</html>