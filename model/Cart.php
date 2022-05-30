<?php

namespace model;

use model\Product;
use Iterator;

/**
 * Manage products in cart
 */
class Cart implements Iterator
{

    /** @var object[] $products Array for products */
    protected $products = array();

    /** @var int[] $ids Array for ID */
    protected $ids = array();

    /** @var int $position Iteration */   
    protected $position = 0;

    public function __construct() 
    {
        $this->products = array();
        $this->ids = array();
    }

    /**
     * Add or increment product
     * 
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        $id = $product->getId();
        if (!isset($this->products[$id])) {
            $this->products[$id] = array('product' => $product, 'amount' => 1);
            $this->ids[] = $id;
        } else {
            $this->updateProduct($product, $this->products[$product]['amount'] + 1);
        }
    }

    /**
     * Update amount of products or delete products
     * 
     * @param Product $product
     * @param int $amount
     */
    public function updateProduct(Product $product, $amount) 
    {
        $id = $product->getId();
        if ($amount != 0) {
            $this->products[$id]['amount'] = $amount;
        } else {
           $this->deleteProduct($product);
        }
    }

    /**
     * Delete products
     * @param Product $product
     */
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
    }
    public function key() 
    {
        return $this->position;
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
    
    /**
     * Return price of all products
     * @return float $sumPrice
     */
    public function getPriceAll()
    {
        $sumPrice=0;
        foreach ($this->products as $product) {
            $sumPrice+=$product['product']->getPrice()*$product['amount'];
        }
        return $sumPrice; 
    }

    /**
     * Count sum of products in cart
     * @return int $sum
     */
    public function sumProducts()
    {
        $sum=0;
            $sum=array_sum(array_column($this->products, 'amount'));
        return $sum;
    }
}
