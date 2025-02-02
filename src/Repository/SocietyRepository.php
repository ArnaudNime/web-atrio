<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Read\Society\Society;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SocietyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Society::class);
    }

    public function getList(): array
    {
        return $this->findBy([], ['name' => 'ASC']);
    }
}