<?php

use src\Product;
use src\Cart;

require('src\Cart.php');
require('src\Product.php');

//products sumple(id,name,code,price)
$p1= new Product(1,"Monitor", 111, 1000);
$p2= new Product(2,"Mysz", 222, 100);
$p3= new Product(3,"Klawiatura", 333, 100);
$p4= new Product(4,"Drukarka", 444, 1000);

$cart = new Cart();

// Add the products to the cart (product):
$cart->addProduct($p1);
$cart->addProduct($p2);
$cart->addProduct($p3);

// Update some quantities (product, amount):
//$cart->updateProduct($p1, 2);
//$cart->updateProduct($p2, 2);

// Delete a product (product):
//$cart->deleteProduct($p1);

// Content of cart:
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Twój Koszyk</h1>
    </br>
    <h2> Zawartość Koszyka</h2>
</body>
</html>
<table>
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Kod</th>
            <th>Ilość</th>
            <th>Cena</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($cart as $list) {
        $product = $list['product'];
        ?>
        <tr>
            <td> <?php echo $product->getName();?></td>
            <td> <?php echo $product->getCode();?></td>
            <td> <?php echo $list['amount'];?></td>
            <td> <?php echo $product->getPrice(); ?> </td>
            <td>  
    </tbody>
    <?php
    }
    ?>
</table>
</br>

<?php

//Return amount of all product
echo 'Ilość produktów w koszyku: '. $cart->sumProducts();
echo '</br>';

//Return total price
echo 'Wartość produktów: '. $cart->getPriceAll();

//Export to .csv
$cart->exportCsv();

//Export to .txt
$cart->exportTxt();