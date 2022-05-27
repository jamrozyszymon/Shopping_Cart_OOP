<?php

namespace controller;

use model\Cart;
use model\Product;
use model\CartExportModel;

//products sample(id,name,code,price)
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

//template for export
class CartController
{
    public function exportToFile()
    {
        if(isset($_POST['csv'])){
        $this->cartExport->exportCsv();

        }
        if(isset($_POST['txt'])){
            $this->cartExport->exportTxt();
        }
    }
}

//export
$cartController= new CartController;
$cartExport= new CartExportModel;
$cartController->cartExport=$cartExport;
$cartExport->cart=$cart;
$index=$cartController->exportToFile();