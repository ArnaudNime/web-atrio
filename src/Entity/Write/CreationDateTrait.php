<?php

namespace App\Entity\Write;

use DateTimeImmutable;
use DateTimeZone;
use Exception;

trait CreationDateTrait
{
    /**
     * @throws Exception
     */
    public function getCreationDate(): string
    {
        return (new DateTimeImmutable('now', new DateTimeZone('Europe/Paris')))->format('Y-m-d');
    }
}