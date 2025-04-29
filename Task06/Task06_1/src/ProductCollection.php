<?php

class ProductCollection
{
    private $products;

    public function __construct(array $products)
    {
        $this->products = $products;
    }

    public function filter(ProductFilteringStrategy $filterStrategy): ProductCollection
    {
        $filteredProducts = array_filter($this->products, function ($product) use ($filterStrategy) {
            return $filterStrategy->filter($product);
        });
        return new ProductCollection(array_values($filteredProducts));
    }

    public function getProductsArray(): array
    {
        return $this->products;
    }
}
