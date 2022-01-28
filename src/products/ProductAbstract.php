<?php

namespace App\products;

abstract class ProductAbstract
{
    public $quality;
    public $sellIn;

    /**
     *
     * Initialize properties
     *
     * @param $quality
     * @param $sellIn
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     *
     * Generic response
     *
     * @return array
     */
    public function response(): array
    {
        return [
            'quality' => $this->quality,
            'sellIn' => $this->sellIn,
        ];
    }
}