<?php

session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products</title>

</head>
<style>

  body {
    font-family: Arial, sans-serif;
    background: #f4f4f9;
    margin: 0;
    padding: 0;
    color: #333;
  }

  
  .section__container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
  }

  .section__header {
    font-size: 2.5rem;
    margin-bottom: 2rem;
    color: darkgreen;
    text-transform: uppercase;
    letter-spacing: 2px;
    animation: fadeIn 1.5s ease-in-out;
  }

  
  .product__grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    padding: 1rem;
  }

  .product__card {
    background: #fff;
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    overflow: hidden;
    position: relative;
  }

  .product__card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  }

  .product__card img {
    width: 100px;
    height: auto;
    margin: 1rem 0;
    transition: transform 0.3s ease-in-out;
  }

  .product__card:hover img {
    transform: scale(1.1);
  }

  .product__card h4 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #333;
  }

  .product__card p {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    color: #5c67f2;
  }

 
  button {
    background: green;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 0.8rem 1.5rem;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
  }

  button:hover {
    background: darkcyan;
    transform: scale(1.05);
  }

  
  footer {
    margin-top: 2rem;
    padding: 1rem;
    background: gray;
    color: #fff;
    text-align: center;
  }

  footer a {
    color: green;
    text-decoration: none;
    font-size: 1.2rem;
    margin: 0 1rem;
    transition: color 0.3s ease;
  }

  footer a:hover {
    color: #fff;
  }

  footer button {
    background: green;
    color: #fff;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 1rem;
  }

  footer button:hover {
    background: darkcyan;
  }

  /* Animations */
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>

<body>
  <section class="section__container product__container" id="product">
    <h2 class="section__header">Products</h2>
    <div class="product__grid">
      <div class="product__card">
        <h4>Calculator</h4>
        <p>R300.00</p>
        <img src="calculator.PNG" alt="Calculator">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="Calculator">
          <input type="hidden" name="price" value="300">
          <input type="hidden" name="image" value="calculator.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
      <div class="product__card">
        <h4>Study Material Combo</h4>
        <p>R200.00</p>
        <img src="cover.PNG" alt="Study Material Combo">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="Study Material Combo">
          <input type="hidden" name="price" value="200">
          <input type="hidden" name="image" value="cover.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
      <div class="product__card">
        <h4>Fridge</h4>
        <p>R700.00</p>
        <img src="fridge.PNG" alt="Fridge">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="Fridge">
          <input type="hidden" name="price" value="700">
          <input type="hidden" name="image" value="fridge.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
      <div class="product__card">
        <h4>DS for Developers</h4>
        <p>R150.00</p>
        <img src="pic1.PNG" alt="DS for Developers">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="DS for Developers">
          <input type="hidden" name="price" value="150">
          <input type="hidden" name="image" value="pic1.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
      <div class="product__card">
        <h4>LO Engineering</h4>
        <p>R200.00</p>
        <img src="pic2.PNG" alt="LO Engineering">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="LO Engineering">
          <input type="hidden" name="price" value="200">
          <input type="hidden" name="image" value="pic2.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
      <div class="product__card">
        <h4>Study Lamp</h4>
        <p>R50.00</p>
        <img src="studylamp.PNG" alt="Study Lamp">
        <form method="POST" action="cart.php">
          <input type="hidden" name="action" value="add">
          <input type="hidden" name="name" value="Study Lamp">
          <input type="hidden" name="price" value="50">
          <input type="hidden" name="image" value="studylamp.PNG">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
    </div>
  </section>
  <footer>
    <li><a href="cart.php">View Cart</a></li>
    <button onclick="window.location.href='index.php'">Go back to the main page</button>
    <p>&copy; 2024 | StudentHub</p>
  </footer>
</body>

</html>