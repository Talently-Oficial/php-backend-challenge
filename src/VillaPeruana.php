<?php

namespace App;

use App\factories\SellFactory;
use Exception;

class VillaPeruana
{
    public $name;
    public $quality;
    public $sellIn;

    /**
     * @param $name
     * @param $quality
     * @param $sellIn
     */
    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn): VillaPeruana
    {
        return new static($name, $quality, $sellIn);
    }

    /**
     * @throws Exception
     */
    public function tick()
    {
        $sellFactory = new SellFactory();
        $sell = $sellFactory->initialize($this->name, $this->quality, $this->sellIn);
        $response = $sell->tick();

        $this->quality = $response['quality'] ?? $this->quality;
        $this->sellIn = $response['sellIn'] ?? $this->sellIn;
    }
}
