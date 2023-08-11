<?php

declare(strict_types=1);

namespace App;

final class QualityUpdaterFactory
{
    public static function create(Name $name, Quality $quality, SellIn $sellIn): QualityUpdater
    {
        if (!$name->isPiscoPeruano() && !$name->isTicketVipAlConciertoDePickFloid()) {
            return new RegularQualityUpdater($quality, $name);
        }

        return new SpecialQualityUpdater($quality, $name, $sellIn);
    }
}
