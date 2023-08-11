<?php

declare(strict_types=1);

namespace App;

final class VillaPeruana
{
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

    public function name(): Name
    {
        return $this->name;
    }

    public function quality(): Quality
    {
        return $this->quality;
    }

    public function sellIn(): SellIn
    {
        return $this->sellIn;
    }

    public static function of(string $name, int $quality, int $sellIn): self
    {
        return new self(new Name($name), new Quality($quality), new SellIn($sellIn));
    }

    public function tick()
    {
        $this->updateQuality();
    }

    private function updateQuality()
    {
        if (!$this->name->isPiscoPeruano() && !$this->name->isTicketVipAlConciertoDePickFloid()) {
            if ($this->quality->isGreaterThanMinValue() && !$this->name->isTumiDeOroMoche()) {
                $this->quality = $this->quality->decrease();
            }
        } elseif ($this->quality->isLessThanMaxValue()) {
            $this->quality = $this->quality->increase();

            if ($this->name->isTicketVipAlConciertoDePickFloid()) {
                if ($this->sellIn->value() < 11 && $this->quality->isLessThanMaxValue()) {
                    $this->quality = $this->quality->increase();
                }
                if ($this->sellIn->value() < 6 && $this->quality->isLessThanMaxValue()) {
                    $this->quality = $this->quality->increase();
                }
            }
        }

        $this->updateSellIn();

        if ($this->sellIn->value() < 0) {
            if (!$this->name->isPiscoPeruano()) {
                if ($this->name->isTicketVipAlConciertoDePickFloid()) {
                    $this->quality = $this->quality->decrease($this->quality->value());
                    return;
                }

                if ($this->quality->isGreaterThanMinValue() && !$this->name->isTumiDeOroMoche()) {
                    $this->quality = $this->quality->decrease();
                }
            } elseif ($this->quality->isLessThanMaxValue()) {
                $this->quality = $this->quality->increase();
            }
        }
    }

    private function updateSellIn()
    {
        if (!$this->name->isTumiDeOroMoche()) {
            $this->sellIn = $this->sellIn->decrease();
        }
    }
}
