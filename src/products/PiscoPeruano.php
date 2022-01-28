<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class PiscoPeruano extends ProductAbstract implements SellingTemplateInterface
{
    /**
     *
     * Business logic for PiscoPeruano
     *
     * @return array
     */
    public function tick(): array
    {
        --$this->sellIn;
        if ($this->quality < 50) {
            ++$this->quality;
        }
        if (($this->sellIn < 0) && $this->quality < 50) {
            ++$this->quality;
        }
        return $this->response();
    }
}