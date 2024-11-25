const menuButton = document.querySelector('.menu-button');
const navLinks = document.querySelector('.nav__links');

menuButton.addEventListener('click', () => {
  navLinks.classList.toggle('open');
});


function addToCart(productName, price, image) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            name: productName,
            price: price,
            image: image,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert(`${productName} has been added to your cart!`);
            } else {
                alert(`Failed to add ${productName} to the cart. Try again.`);
            }
        })
        .catch((error) => console.error('Error:', error));
}
