<?php
session_start();

// Retrieve form data from checkout page
$email = isset($_POST['email']) ? $_POST['email'] : 'Unknown email';
$name = isset($_POST['name']) ? $_POST['name'] : 'Unknown customer';

// Retrieve the order details from the cart
$orderedItems = $_SESSION['cart'] ?? [];
$totalPrice = 0;
if (!empty($orderedItems)) {
    foreach ($orderedItems as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        html,
        body {
            height: 100%;
            /* Ensure full height */
            margin: 0;
            /* Remove default margin */
            display: flex;
            /* Use Flexbox */
            align-items: center;
            /* Center vertically */
            justify-content: center;
            font-family: Arial, sans-serif;
            background-image: url('cover page.PNG');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .summary-container {
            background-image: url('cover page.PNG');
            padding: 20px;
            width: 90%;
            /* Set a width */
            max-width: 600px;
            /* Limit maximum width */
            margin: 0 auto;
            position: relative;
            border-radius: 8px;
            /* Optional: add rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            /* Optional: add shadow for depth */
        }

        .summary-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            z-index: 1;
            border-radius: 10px;
            /* Match border radius */
        }

        .summary-container>* {
            position: relative;
            z-index: 2;
        }

        .button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            position: relative;
            overflow: hidden;
            transition: background-color 0.3s, transform 0.3s;
        }

        .button:hover {
            background-color: #218838;
            transform: translateY(-3px);
            /* Slight lift on hover */
        }

        .button:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s;
            z-index: 0;
        }

        .button:hover:after {
            transform: translate(-50%, -50%) scale(1);
        }

        .button span {
            position: relative;
            z-index: 1;
            /* Ensure text is above the pseudo-element */
        }

        @keyframes confetti {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(100vh);
            }
        }

        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background-color: red;
            opacity: 0.8;
            pointer-events: none;
            animation: confetti 3s linear infinite;
        }

        .confetti:nth-child(2) {
            background-color: blue;
            animation-delay: 0.5s;
        }

        .confetti:nth-child(3) {
            background-color: green;
            animation-delay: 1s;
        }

        @keyframes emoji-fall {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(100vh);
            }
        }

        .emoji {
            position: absolute;
            font-size: 24px;
            /* Adjust size as needed */
            pointer-events: none;
            animation: emoji-fall 5s linear infinite;
        }
    </style>
</head>

<body>

    <div class="summary-container">
        <h1>Order Summary</h1>
        <?php if (!empty($orderedItems)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orderedItems as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td>R<?= number_format($item['price'], 2) ?></td>
                            <td>R<?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" class="total">Total Amount:</td>
                        <td>R<?= number_format($totalPrice, 2) ?></td>
                    </tr>
                </tbody>
            </table>
            <p>Thank you for your order! <span>&#x1F642;</span></p>

            <p> We have sent a confirmation email to <b><?= htmlspecialchars($email) ?></b>. </p>

            <button class="button" onclick="window.location.href='index.php'"><span>Go back to the main page</span></button>
        <?php else: ?>
            <p>No items ordered.</p>
        <?php endif; ?>
    </div>

    <script>
        function createConfetti() {
            const colors = ['red', 'blue', 'green', 'yellow', 'purple', 'orange'];
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw'; // Random position
                confetti.style.animationDuration = Math.random() * 2 + 3 + 's'; // Random duration
                document.body.appendChild(confetti);
                // Remove the confetti after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }

        function createEmojis() {
            const emojis = ['🎉', '🎊', '🎈'];
            for (let i = 0; i < 20; i++) {
                const emoji = document.createElement('div');
                emoji.className = 'emoji';
                emoji.innerText = emojis[Math.floor(Math.random() * emojis.length)];
                emoji.style.left = Math.random() * 100 + 'vw'; // Random position
                emoji.style.animationDuration = Math.random() * 2 + 5 + 's'; // Random duration
                document.body.appendChild(emoji);
                // Remove the emoji after animation
                setTimeout(() => {
                    emoji.remove();
                }, 5000);
            }
        }

        window.onload = function() {
            createConfetti();
            createEmojis(); // Trigger emojis on page load
        };
    </script>

</body>

</html>