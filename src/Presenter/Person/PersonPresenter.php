<?php

namespace App\Presenter\Person;

use App\Entity\Read\Person\Person;
use App\Entity\Read\Person\ProfessionalExperience;

readonly class PersonPresenter
{
    public function present(Person $person): array
    {
        return [
            'person' => $person->toArray(),
            'professional_experiences' => array_map(static function (ProfessionalExperience $experience) {
                return $experience->toArray();
            }, $person->professionalExperience->toArray())
        ];
    }
}