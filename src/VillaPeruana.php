<?php

declare(strict_types=1);

namespace App;

final class VillaPeruana
{
     private const PISCO_PERUANO = 'Pisco Peruano';
     private const TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID = 'Ticket VIP al concierto de Pick Floid';
     private const TUMI_DE_ORO_MOCHE = 'Tumi de Oro Moche';
    private const MAX_QUALITY = 50;
    private const MIN_QUALITY = 0;

    private Name $name;

    private Quality $quality;

    private SellIn $sellIn;

    private function __construct(Name $name, Quality $quality, SellIn $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function name()
    {
        return $this->name;
    }

    public function quality()
    {
        return $this->quality;
    }

    public function sellIn()
    {
        return $this->sellIn;
    }

    public static function of(string $name, int $quality, int $sellIn): self
    {
        return new self(new Name($name), new Quality($quality), new SellIn($sellIn));
    }

    public function tick()
    {
        if ($this->name->value() !== self::PISCO_PERUANO && $this->name->value() !== self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID) {
            if ($this->quality->value() > self::MIN_QUALITY && $this->name->value() !== self::TUMI_DE_ORO_MOCHE) {
                $this->quality = $this->quality->decrease();
            }
        } elseif ($this->quality->value() < self::MAX_QUALITY) {
            $this->quality = $this->quality->increase();

            if ($this->name->value() === self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID) {
                if ($this->sellIn->value() < 11 && $this->quality->value() < self::MAX_QUALITY) {
                    $this->quality = $this->quality->increase();
                }
                if ($this->sellIn->value() < 6 && $this->quality->value() < self::MAX_QUALITY) {
                    $this->quality = $this->quality->increase();
                }
            }
        }

        if ($this->name->value() !== self::TUMI_DE_ORO_MOCHE) {
            $this->sellIn = $this->sellIn->decrease();
        }

        if ($this->sellIn->value() >= 0) {
            return;
        }

        if ($this->name->value() !== self::PISCO_PERUANO) {
            if (!($this->name->value() !== self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID)) {
                $this->quality = $this->quality->decrease($this->quality->value());
                return;
            }

            if ($this->quality->value() > self::MIN_QUALITY && $this->name->value() !== self::TUMI_DE_ORO_MOCHE) {
                $this->quality = $this->quality->decrease();
            }
        } elseif ($this->quality->value() < self::MAX_QUALITY) {
            $this->quality = $this->quality->increase();
        }
    }
}
