<?php

declare(strict_types=1);

namespace App\VillaPeruana\Products\Domain;

final class Regular extends Product
{

    protected function updateQuality()
    {
        if ($this->quality->isGreaterThanMinValue()) {
            $this->quality = $this->quality->decrease();
        }
    }

    protected function updateQualityAfterSellIn()
    {
        if (!$this->sellIn->isNegative()) {
            return;
        }

        $this->updateQuality();
    }
}