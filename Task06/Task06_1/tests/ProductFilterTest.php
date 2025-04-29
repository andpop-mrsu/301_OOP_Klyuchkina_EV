<?php

use PHPUnit\Framework\TestCase;

class ProductFilterTest extends TestCase
{
    public function testManufacturerFilter()
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100;
        $p2->manufacturer = 'Ламзурь';

        $collection = new ProductCollection([$p1, $p2]);

        $resultCollection = $collection->filter(new ManufacturerFilter('Ламзурь'));
        $this->assertCount(1, $resultCollection->getProductsArray());
        $this->assertEquals('Мармелад', $resultCollection->getProductsArray()[0]->name);
    }

    public function testMaxPriceFilter()
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->sellingPrice = 50;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 100;
        $p2->manufacturer = 'Ламзурь';

        $collection = new ProductCollection([$p1, $p2]);

        $resultCollection = $collection->filter(new MaxPriceFilter(50));
        $this->assertCount(1, $resultCollection->getProductsArray());
        $this->assertEquals('Шоколад', $resultCollection->getProductsArray()[0]->name);
    }

    public function testMaxPriceFilterWithoutDiscount()
    {
        $p1 = new Product();
        $p1->name = 'Шоколад';
        $p1->listPrice = 100;
        $p1->manufacturer = 'Красный Октябрь';

        $p2 = new Product();
        $p2->name = 'Мармелад';
        $p2->listPrice = 50;
        $p2->manufacturer = 'Ламзурь';

        $collection = new ProductCollection([$p1, $p2]);

        $resultCollection = $collection->filter(new MaxPriceFilter(50));
        $this->assertCount(1, $resultCollection->getProductsArray());
        $this->assertEquals('Мармелад', $resultCollection->getProductsArray()[0]->name);
    }
}
