<?php

namespace App\products;

abstract class ProductAbstract
{
    public $quality;
    public $sellIn;

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function response()
    {
        return [
            'quality' => $this->quality,
            'sellIn' => $this->sellIn,
        ];
    }
}