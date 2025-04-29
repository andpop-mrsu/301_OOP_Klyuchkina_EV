<?php

class Product
{
    public $name;
    public $manufacturer;
    public $listPrice;
    public $sellingPrice;

    public function getFinalPrice(): float
    {
        return $this->sellingPrice ?? $this->listPrice;
    }
}
