<?php

declare(strict_types=1);

namespace App\Entity\Read\Society;

use App\Repository\SocietyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SocietyRepository::class)]
#[ORM\Table(name: "society")]
readonly class Society
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public int $id;

    #[ORM\Column(length: 50)]
    public readonly string $name;
}