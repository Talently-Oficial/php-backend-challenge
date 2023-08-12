<?php

declare(strict_types=1);

namespace App\Products\Application;

use App\Products\Domain\Entities\PiscoPeruano;
use App\Products\Domain\Entities\Product;
use App\Products\Domain\Entities\Regular;
use App\Products\Domain\Entities\TicketVipAlConciertoDePickFloid;
use App\Products\Domain\Entities\TumiDeOroMoche;
use App\Products\Domain\ValueObjects\Quality;
use App\Products\Domain\ValueObjects\SellIn;

final class ProductFactory
{
    private const PRODUCTS = [
        'Pisco Peruano' => PiscoPeruano::class,
        'Ticket VIP al concierto de Pick Floid' => TicketVipAlConciertoDePickFloid::class,
        'Tumi de Oro Moche' => TumiDeOroMoche::class,
    ];

    public static function create(string $name, int $quality, int $sellIn): Product
    {
        return new self::PRODUCTS[$name](new Quality($quality), new SellIn($sellIn)) ??
            new Regular(new Quality($quality), new SellIn($sellIn));
    }
}
