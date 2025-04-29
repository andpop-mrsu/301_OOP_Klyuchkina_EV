<?php

class MaxPriceFilter implements ProductFilteringStrategy
{
    private $maxPrice;

    public function __construct(float $maxPrice)
    {
        $this->maxPrice = $maxPrice;
    }

    public function filter(Product $product): bool
    {
        return $product->getFinalPrice() <= $this->maxPrice;
    }
}
