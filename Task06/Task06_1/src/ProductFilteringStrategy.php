<?php

interface ProductFilteringStrategy
{
    public function filter(Product $product): bool;
}
