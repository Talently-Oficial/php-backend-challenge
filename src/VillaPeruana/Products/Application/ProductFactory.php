<?php

declare(strict_types=1);

namespace App\VillaPeruana\Products\Application;

use App\VillaPeruana\Products\Domain\PiscoPeruano;
use App\VillaPeruana\Products\Domain\Product;
use App\VillaPeruana\Products\Domain\Regular;
use App\VillaPeruana\Products\Domain\TicketVipAlConciertoDePickFloid;
use App\VillaPeruana\Products\Domain\TumiDeOroMoche;
use App\VillaPeruana\Products\Domain\ValueObjects\Name;
use App\VillaPeruana\Products\Domain\ValueObjects\Quality;
use App\VillaPeruana\Products\Domain\ValueObjects\SellIn;

final class ProductFactory
{
    private const PISCO_PERUANO = 'Pisco Peruano';

    private const TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID = 'Ticket VIP al concierto de Pick Floid';

    private const TUMI_DE_ORO_MOCHE = 'Tumi de Oro Moche';

    public static function create(Name $name, Quality $quality, SellIn $sellIn): Product
    {
        switch ($name->value()) {
            case self::PISCO_PERUANO:
                return new PiscoPeruano($quality, $sellIn);
            case self::TUMI_DE_ORO_MOCHE:
                return new TumiDeOroMoche($quality, $sellIn);
            case self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID:
                return new TicketVipAlConciertoDePickFloid($quality, $sellIn);
            default:
                return new Regular($quality, $sellIn);
        }
    }
}
