<?php

declare(strict_types=1);

namespace App;

final class SpecialQualityUpdater implements QualityUpdater
{
    private Quality $quality;
    private Name $name;
    private SellIn $sellIn;

    public function __construct(Quality $quality, Name $name, SellIn $sellIn)
    {
        $this->quality = $quality;
        $this->name = $name;
        $this->sellIn = $sellIn;
    }

    public function update(): Quality
    {
        if (!$this->quality->isLessThanMaxValue()) {
            return $this->quality;
        }

        $this->quality = $this->quality->increase();

        if (!$this->name->isTicketVipAlConciertoDePickFloid()) {
            return $this->quality;
        }

        if ($this->sellIn->isThereTenDaysOrLess()) {
            $this->quality = $this->quality->increase();
        }

        if ($this->sellIn->isThereFiveDaysOrLess()) {
            $this->quality = $this->quality->increase();
        }

        return $this->quality;
    }
}
