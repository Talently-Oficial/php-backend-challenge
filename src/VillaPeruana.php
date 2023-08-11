<?php

declare(strict_types=1);

namespace App;

final class VillaPeruana
{

    private Product $product;

    private function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function name(): string
    {
        return $this->product->name();
    }

    public function quality(): int
    {
        return $this->product->quality()->value();
    }

    public function sellIn(): int
    {
        return $this->product->sellIn()->value();
    }

    public static function of(string $name, int $quality, int $sellIn): self
    {
        return new self(ProductFactory::create(new Name($name), new Quality($quality), new SellIn($sellIn)));
    }

    public function tick()
    {
        $this->product->update();
    }
}
