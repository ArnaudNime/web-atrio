<?php

declare(strict_types=1);

namespace App\Entity\Read\Person;

use App\Repository\Person\PersonListRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonListRepository::class)]
#[ORM\Table(name: "person")]
readonly class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\Column(length: 50)]
    public string $firstname;

    #[ORM\Column(length: 50)]
    public string $lastName;

    #[ORM\Column]
    public string $birthDate;

    #[ORM\OneToMany(targetEntity: ProfessionalExperience::class, mappedBy: 'person')]
    public Collection $professionalExperience;

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'last_name' => $this->lastName,
            'birth_date' => $this->birthDate,
        ];
    }
}