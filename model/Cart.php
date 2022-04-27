<?php

namespace model;

use model\Product;
use Iterator;

class Cart implements Iterator
{
    // Array for products
    public $products = array();

    // Array for ID
    protected $ids = array();

    // Itteration    
    protected $position = 0;

    public function __construct() 
    {
        $this->products = array();
        $this->ids = array();
    }

    // Add product
    public function addProduct(Product $product) 
    {
        $id = $product->getId();
        // Add or increment
        if (!isset($this->products[$id])) {
            $this->products[$id] = array('product' => $product, 'amount' => 1);
            $this->ids[] = $id;
        } else {
            $this->updateProduct($product, $this->products[$product]['amount'] + 1);
        }
    }

    // Update amount of products
    public function updateProduct(Product $product, $amount) 
    {
        $id = $product->getId();
        // Update or delete
        if ($amount != 0) {
            $this->products[$id]['amount'] = $amount;
        } else {
           $this->deleteProduct($product);
        }
    }

    // Delete products
    public function deleteProduct(Product $product)
    {
        $id = $product->getId();
        unset($this->products[$id]);
        //Delete Id from array
        $index = array_search($id, $this->ids);
        unset($this->ids[$index]);
        //Return state of array
        $this->ids = array_values($this->ids);
        
    }

    // Iterator
    public function current() 
    {
        $index = $this->ids[$this->position];
        return $this->products[$index];
        print_R($this->produsts[$index]);
    }
    public function key() 
    {
        return $this->position;
        print_r($this->position);
    }
    public function next() :void 
    {
        ++$this->position;
    }
    public function rewind() :void 
    {
        $this->position = 0;
    }
    public function valid() :bool 
    {
        return (isset($this->ids[$this->position]));
    }
    //Iterator end
    
    //Return price of all products
    public function getPriceAll()
    {
        $sumPrice=0;
        foreach ($this->products as $product) {
            $sumPrice+=$product['product']->getPrice()*$product['amount'];
        }
        return $sumPrice; 
    }

    //Count sum of products in cart
    public function sumProducts()
    {
        $sum=0;
            $sum=array_sum(array_column($this->products, 'amount'));
        return $sum;
    }
}
