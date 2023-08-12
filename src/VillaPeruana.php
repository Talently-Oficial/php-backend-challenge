<?php

declare(strict_types=1);

namespace App;


use App\Products\Application\ProductFactory;
use App\Products\Domain\Entities\Product;

final class VillaPeruana
{

    private Product $product;

    private function __construct(Product $product)
    {
        $this->product = $product;
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
        return new self(ProductFactory::create($name, $quality, $sellIn));
    }

    public function tick()
    {
        $this->product->update();
    }
}
