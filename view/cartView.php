<?php


    require_once('index.php');
    require('controller/CartController.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/main.css"/>
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
            <div class="tile">
                Ilość produktów w koszyku: <?php echo $cart->sumProducts();?>.
            </div>
            <div class="tile">
                Wartość produktów: <?php echo $cart->getPriceAll();?> zł.
            </div>
        </div>
        <div class="export">
            <h3>Zapisz zawartość koszyka do pliku</h3>
            <form action="" method="post">
            <div class="tile">
                <button class="btn btn-outline-success" type="submit" name="csv">Plik .csv</button>
            </div>
            <div class="tile">
                <button class="btn btn-outline-success" type="submit" name="txt">Plik .txt</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>
