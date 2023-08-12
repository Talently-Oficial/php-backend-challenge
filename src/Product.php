<?php

declare(strict_types=1);

namespace App;

abstract class Product
{
    protected Quality $quality;
    protected SellIn $sellIn;

    public function __construct(Quality $quality, SellIn $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function quality(): Quality
    {
        return $this->quality;
    }

    public function sellIn(): SellIn
    {
        return $this->sellIn;
    }

    public function update()
    {
        $this->updateQuality();
        $this->updateSellIn();
        $this->updateQualityAfterSellIn();
    }

    abstract protected function updateQuality();

    protected function updateSellIn()
    {
        $this->sellIn = $this->sellIn->decrease();
    }

    abstract protected function updateQualityAfterSellIn();
}
