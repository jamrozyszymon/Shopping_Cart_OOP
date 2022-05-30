<?php

namespace model;

class Product 
{
    /** @var int $id Id of products */
    public int $id;

    /** @var string $name Name of products */
    public string $name;

    /** @var int $code Code od products */
    public int $code;

    /** @var float $price Price of products */
    public float $price;

    public function __construct(int $id, string $name, int $code, float $price) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }

    /**
     * @return int $id
     */
    public function getId() 
    {
        return $this->id;
    }

     /**
     * @return string $name
     */
    public function getName() 
    {
        return $this->name;
    }

     /**
     * @return int $code
     */
    public function getCode()
    {
        return $this->code;
    }

     /**
     * @return float $price
     */
    public function getPrice() 
    {
        return $this->price;
    }
} 
