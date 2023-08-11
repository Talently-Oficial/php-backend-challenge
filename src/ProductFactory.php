<?php

declare(strict_types=1);

namespace App;

final class ProductFactory
{

    public static function create(Name $name, Quality $quality, SellIn $sellIn): Product
    {
        switch ($name->value()) {
            case Name::PISCO_PERUANO:
                return new PiscoPeruano($name, $quality, $sellIn);
            case Name::TUMI_DE_ORO_MOCHE:
                return new TumiDeOroMoche($name, $quality, $sellIn);
            case Name::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID:
                return new TicketVipAlConciertoDePickFloid($name, $quality, $sellIn);
            default:
                return new Regular($name, $quality, $sellIn);
        }
    }
}
