<?php

declare(strict_types=1);

namespace App;

final class AfterSellInQualityUpdater implements QualityUpdater
{
    private Quality $quality;
    private Name $name;

    public function __construct(Quality $quality, Name $name)
    {
        $this->quality = $quality;
        $this->name = $name;
    }

    public function update(): Quality
    {
        if ($this->name->isTicketVipAlConciertoDePickFloid()) {
            return $this->quality->reset();
        }

        if ($this->quality->isGreaterThanMinValue() && !$this->name->isTumiDeOroMoche()) {
            return $this->quality->decrease();
        }

        return $this->quality;
    }
}

