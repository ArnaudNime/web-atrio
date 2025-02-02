<?php

declare(strict_types=1);

namespace App\BuilderFromPayload\ProfessionalExperience;

use App\BuilderFromPayload\AssertParam;
use App\Entity\Write\ProfessionalExperienceToCreate;
use Exception;

class ProfessionalExperienceToCreateBuilder
{
    use AssertParam;

    private const VALID_KEYS = [
        'job',
        'start_date',
        'society_id',
        'person_id',
    ];

    /**
     * @throws Exception
     */
    public function buildProfessionalExperience(array $data): ProfessionalExperienceToCreate
    {
        $this->assert(self::VALID_KEYS, $data);

        return new ProfessionalExperienceToCreate(
            $data['job'],
            $data['start_date'],
            $data['end_date'],
            $data['society_id'],
            $data['person_id'],
        );
    }
}