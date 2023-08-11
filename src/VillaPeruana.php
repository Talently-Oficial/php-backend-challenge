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

    private $name;

    private $quality;

    private $sellIn;

    private function __construct($name, $quality, $sellIn)
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

    public static function of($name, $quality, $sellIn): self
    {
        return new self($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name !== self::PISCO_PERUANO && $this->name !== self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID) {
            if ($this->quality > self::MIN_QUALITY && $this->name !== self::TUMI_DE_ORO_MOCHE) {
                --$this->quality;
            }
        } elseif ($this->quality < self::MAX_QUALITY) {
            ++$this->quality;

            if ($this->name === self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID) {
                if ($this->sellIn < 11 && $this->quality < self::MAX_QUALITY) {
                    ++$this->quality;
                }
                if ($this->sellIn < 6 && $this->quality < self::MAX_QUALITY) {
                    ++$this->quality;
                }
            }
        }

        if ($this->name !== self::TUMI_DE_ORO_MOCHE) {
            --$this->sellIn;
        }

        if ($this->sellIn >= 0) {
            return;
        }

        if ($this->name !== self::PISCO_PERUANO) {
            if (!($this->name !== self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID)) {
                $this->quality -= $this->quality;
                return;
            }

            if ($this->quality > self::MIN_QUALITY && $this->name !== self::TUMI_DE_ORO_MOCHE) {
                --$this->quality;
            }
        } elseif ($this->quality < self::MAX_QUALITY) {
            ++$this->quality;
        }
    }
}
