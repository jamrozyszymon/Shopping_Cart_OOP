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

//Export to .csv
$cart->exportCsv();

//Export to .txt
$cart->exportTxt();

// Content of cart:
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css"/>
</head>
<body>
    <header>
        <h1>Twój Koszyk</h1>
    </header>
    <main>
        <h2> Zawartość Koszyka</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nazwa Produktu</th>
                    <th scope="col">Kod Produktu</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Cena</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($cart as $list) {
                $product = $list['product'];
                ?>
                <tr>
                    <td> <?php echo $product->getName();?> </td>
                    <td> <?php echo $product->getCode();?> </td>
                    <td> <?php echo $list['amount'];?> </td>
                    <td> <?php echo $product->getPrice(); ?> zł</td>
                    <td>  
            <?php
            }
            ?>
            </tbody>
        </table>
        <div class="mainfooter">
            <h3>Podsumowanie</h3>
            <div>
                Ilość produktów w koszyku: <?php echo $cart->sumProducts();?>.
            </div>
            <div>
                Wartość produktów: <?php echo $cart->getPriceAll();?> zł.
            </div>
        </div>
    </main>
</body>
</html>

<?php
