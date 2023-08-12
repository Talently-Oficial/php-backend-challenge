<?php

declare(strict_types=1);

namespace App\VillaPeruana\Products\Domain;

final class TicketVipAlConciertoDePickFloid extends Product
{

    protected function updateQuality()
    {
        if ($this->quality->isLessThanMaxValue()) {
            $this->quality = $this->quality->increase();

            if ($this->sellIn->isThereTenDaysOrLess()) {
                $this->quality = $this->quality->increase();
            }

            if ($this->sellIn->isThereFiveDaysOrLess()) {
                $this->quality = $this->quality->increase();
            }
        }
    }

    protected function updateQualityAfterSellIn()
    {
        if ($this->sellIn->isNegative()) {
            $this->quality =  $this->quality->reset();
        }
    }
}
