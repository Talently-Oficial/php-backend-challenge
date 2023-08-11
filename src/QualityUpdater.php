<?php

declare(strict_types=1);

namespace App;

interface QualityUpdater
{
    public function update(): Quality;
}
