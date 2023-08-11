<?php

declare(strict_types=1);

namespace App;

abstract class Product
{
    protected Name $name;

    protected Quality $quality;
    protected SellIn $sellIn;

    public function __construct(Name $name, Quality $quality, SellIn $sellIn)
    {
        $this->name = $name;
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

    private function updateSellIn()
    {
        if (!$this->name->isTumiDeOroMoche()) {
            $this->sellIn = $this->sellIn->decrease();
        }
    }

    abstract protected function updateQualityAfterSellIn();
}
