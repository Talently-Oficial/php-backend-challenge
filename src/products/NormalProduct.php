<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class NormalProduct extends ProductAbstract implements SellingTemplateInterface
{
    /**
     *
     * Business logic for NormalProduct
     *
     * @return array
     */
    public function tick(): array
    {
        --$this->sellIn;

        if ($this->quality > 0) {
            --$this->quality;
        }
        if ($this->sellIn < 0 && $this->quality > 0) {
            --$this->quality;
        }
        return $this->response();
    }
}