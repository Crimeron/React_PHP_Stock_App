<?php

abstract class Product
{
    protected string $sku;
    protected string $name;
    protected float $price;
    protected float $weight;
    protected int $size;
    protected int $height;
    protected int $width;
    protected int $length;

    public function __construct()
    {
        $this->name = '';
        $this->sku = '';
        $this->price = 0.0;
        $this->weight = 0.0;
        $this->size = 0;
        $this->height = 0;
        $this->width = 0;
        $this->length = 0;
    }

    public function setSku(string $sku)
    {
        if (strlen($sku) > 2) {
            $this->sku = $sku;
        } else {
        }
    }

    public function setName(string $name)
    {
        if (strlen($name) > 1) {
            $this->name = $name;
        } else {
        }
    }

    public function setPrice($price)
    {
        if ($price >= 0) {
            $this->price = $price;
        } else {
        }
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    abstract public function filldata($data);

    abstract public function getData();
}
