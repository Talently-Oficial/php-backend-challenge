<?php

declare(strict_types=1);

namespace App;

final class ProductFactory
{
    private const PRODUCTS = [
        'Pisco Peruano' => PiscoPeruano::class,
        'Ticket VIP al concierto de Pick Floid' => TicketVipAlConciertoDePickFloid::class,
        'Tumi de Oro Moche' => TumiDeOroMoche::class,
        'Café Altocusco' => CafeAltocusco::class,
    ];

    public static function create(string $name, int $quality, int $sellIn): Product
    {
        $productClass = self::productClass($name);

        return new $productClass(new Quality($quality), new SellIn($sellIn));
    }

    private static function productClass(string $name): string
    {
        return self::PRODUCTS[$name] ?? Regular::class;
    }
}
