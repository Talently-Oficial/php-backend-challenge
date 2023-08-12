<?php

declare(strict_types=1);

namespace App;

final class CafeAltocusco extends Product
{

    protected function updateQuality()
    {
        if ($this->quality->isGreaterThanMinValue()) {
            $this->quality = $this->quality->decrease(2);
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
