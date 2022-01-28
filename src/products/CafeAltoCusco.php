<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class CafeAltoCusco extends ProductAbstract implements SellingTemplateInterface
{
    /**
     *
     * Business logic for CafeAltoCusco
     *
     * @return array
     */
    public function tick(): array
    {
        if ($this->quality > 0) {
            $this->quality -= 2;

            if ($this->sellIn === 0) {
                $this->quality -= 2;
            } elseif ($this->sellIn < 0) {
                $this->quality -= 2;
            }
        }
        --$this->sellIn;
        return $this->response();
    }
}