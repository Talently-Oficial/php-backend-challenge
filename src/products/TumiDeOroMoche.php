<?php

namespace App\products;

use App\interfaces\SellingTemplateInterface;

class TumiDeOroMoche extends ProductAbstract implements SellingTemplateInterface
{
    /**
     *
     * Business logic for TumiDeOroMoche
     *
     * @return array
     */
    public function tick(): array
    {
        return $this->response();
    }
}