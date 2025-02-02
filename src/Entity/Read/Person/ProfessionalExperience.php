<?php

declare(strict_types=1);

namespace App\Entity\Read\Person;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "professional_experience")]
readonly class ProfessionalExperience
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50)]
    public string $job;

    #[ORM\Column]
    public string $startDate;

    #[ORM\Column]
    public ?string $endDate;

    #[ORM\ManyToOne(targetEntity: Person::class, inversedBy: 'professionalExperiences')]
    public Person $person;

    #[ORM\ManyToOne(targetEntity: Society::class, inversedBy: 'professionalExperiences')]
    public Society $society;

    #[ORM\Column]
    private string $creation_date;

    public function toArray(): array
    {
        return [
            'job' => $this->job,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate ?? 'not finished',
            'society' => $this->society->name,
        ];
    }
}