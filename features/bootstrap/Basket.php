<?php
// features/bootstrap/Basket.php

final class Basket implements \Countable
{
    private $shelf;
    private $products;
    private $productsPrice;
    
    public function __construct(Shelf $shelf)
    {
        $this->shelf = $shelf;
    }

    public function addProduct($product)
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function getTotalPrice()
    {
        return $this->productsPrice
            + ($this->getVat())
            + ($this->getDeliveryPrice());
    }

    public function count()
    {
        return count($this->products);
    }

    private function getVat()
    {
        return $this->productsPrice * 0.2;
    }

    private function getDeliveryPrice()
    {
        return $this->productsPrice > 10 ? 2.0 : 3.0;
    }
}
