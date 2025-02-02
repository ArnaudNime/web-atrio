<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Read\Person\Person;
use App\Entity\Read\Person\ProfessionalExperience;
use App\Entity\Read\Person\Society;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

class PersonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Person::class);
    }

    public function getList(): array
    {
        return $this->findBy([], ['lastName' => 'ASC', 'firstname' => 'ASC']);
    }

    public function getPerson(int $personId): Person
    {
        return $this->findOneBy(['id' => $personId]);
    }

    public function getListBySociety(int $societyId): array
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('p')
            ->from(Person::class, 'p')
            ->leftJoin(ProfessionalExperience::class, 'e', Join::WITH, 'e.person = p.id')
            ->leftJoin(Society::class, 's', Join::WITH, 'e.society = s.id')
            ->where('s.id = :societyId')
            ->orderBy('p.lastName, p.firstname');

        $qb->setParameter(':societyId', $societyId);

        return $qb->getQuery()->execute();
    }
}