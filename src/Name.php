<?php

declare(strict_types=1);

namespace App;

final class Name
{
    private const PISCO_PERUANO = 'Pisco Peruano';

    private const TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID = 'Ticket VIP al concierto de Pick Floid';

    private const TUMI_DE_ORO_MOCHE = 'Tumi de Oro Moche';

    private string $value;

    public function __construct(string $value)
    {
        // Validations and business rules related to name
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function isPiscoPeruano(): bool
    {
        return $this->value() === self::PISCO_PERUANO;
    }

    public function isTicketVipAlConciertoDePickFloid(): bool
    {
        return $this->value() === self::TICKET_VIP_AL_CONCIERTO_DE_PICK_FLOID;
    }

    public function isTumiDeOroMoche()
    {
        return $this->value() === self::TUMI_DE_ORO_MOCHE;
    }
}
