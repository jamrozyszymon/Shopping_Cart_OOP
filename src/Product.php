<?php

namespace src;

class Product 
{
    public int $id;
    public string $name;
    public int $code;
    public float $price;

    public function __construct($id, $name, $code, $price) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }
    public function getId() 
    {
        return $this->id;
    }
    public function getName() 
    {
        return $this->name;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getPrice() 
    {
        return $this->price;
    }
} 
