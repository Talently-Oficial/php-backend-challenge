<?php

declare(strict_types=1);

namespace App;

final class VillaPeruana
{
    private $name;

    private $quality;

    private $sellIn;

    public function __construct($name, $quality, $sellIn)
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
        if ($this->name !== 'Pisco Peruano' && $this->name !== 'Ticket VIP al concierto de Pick Floid') {
            if ($this->quality > 0) {
                if ($this->name !== 'Tumi de Oro Moche') {
                    --$this->quality;
                }
            }
        } else {
            if ($this->quality < 50) {
                ++$this->quality;

                if ($this->name === 'Ticket VIP al concierto de Pick Floid') {
                    if ($this->sellIn < 11) {
                        if ($this->quality < 50) {
                            ++$this->quality;
                        }
                    }
                    if ($this->sellIn < 6) {
                        if ($this->quality < 50) {
                            ++$this->quality;
                        }
                    }
                }
            }
        }

        if ($this->name !== 'Tumi de Oro Moche') {
            --$this->sellIn;
        }

        if ($this->sellIn < 0) {
            if ($this->name !== 'Pisco Peruano') {
                if ($this->name !== 'Ticket VIP al concierto de Pick Floid') {
                    if ($this->quality > 0) {
                        if ($this->name !== 'Tumi de Oro Moche') {
                            --$this->quality;
                        }
                    }
                } else {
                    $this->quality -= $this->quality;
                }
            } else {
                if ($this->quality < 50) {
                    ++$this->quality;
                }
            }
        }
    }
}
