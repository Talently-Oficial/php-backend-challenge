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

    public static function createAfterSellIn(Name $name, Quality $quality): QualityUpdater
    {
        if (!$name->isPiscoPeruano()) {
            return new AfterSellInQualityUpdater($quality, $name);
        }

        return new SpecialQualityUpdater($quality, $name, new SellIn(0));
    }
}
