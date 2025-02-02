<?php

declare(strict_types=1);

namespace App\Entity\Read\Person;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "society")]
class Society
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50)]
    public readonly string $name;

    #[ORM\OneToMany(targetEntity: ProfessionalExperience::class, mappedBy: 'society')]
    private Collection $professionalExperience;
}