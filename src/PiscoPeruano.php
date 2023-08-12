<?php

declare(strict_types=1);

namespace App;

final class PiscoPeruano extends Product
{

    protected function updateQuality()
    {
        if ($this->quality->isLessThanMaxValue()) {
            $this->quality = $this->quality->increase();
        }
    }

    protected function updateQualityAfterSellIn()
    {
        if ($this->sellIn->isNegative()) {
            $this->updateQuality();
        }
    }
}
