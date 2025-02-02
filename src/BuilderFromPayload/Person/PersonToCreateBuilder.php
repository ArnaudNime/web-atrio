<?php

declare(strict_types=1);

namespace App\BuilderFromPayload\Person;

use App\BuilderFromPayload\AssertParam;
use App\Entity\Write\PersonToCreate;

class PersonToCreateBuilder
{
    use AssertParam;

    private const VALID_KEYS = [
        'firstname',
        'last_name',
        'birth_date',
    ];

    public function buildCreatePerson(array $data): PersonToCreate
    {
        $this->assert(self::VALID_KEYS, $data);

        return new PersonToCreate(
            $data['firstname'],
            $data['last_name'],
            $data['birth_date'],
        );
    }
}