<?php

declare(strict_types=1);

namespace App\Entity\Write;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use DomainException;
use Exception;

#[ORM\Entity]
#[ORM\Table(name: "person")]
class PersonToCreate
{
    use CreationDateTrait;

    private const AGE_LIMIT = 150;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50)]
    private string $firstname;

    #[ORM\Column(length: 50)]
    private string $lastName;

    #[ORM\Column]
    private string $birthDate;

    #[ORM\Column]
    private string $creation_date;

    /**
     * @throws Exception
     */
    public function __construct(string $firstname, string $lastName, string $birthDate)
    {
        $this->checkAge($birthDate);
        $this->firstname = $firstname;
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->creation_date = $this->getCreationDate();
    }

    private function checkAge(string $birthDate): void
    {
        $birthdate = date_create_from_format('Y-m-d', $birthDate);
        $now = new DateTimeImmutable();
        $diff = $now->diff($birthdate)->y;
        if ($diff > self::AGE_LIMIT) {
            throw new DomainException('this person is too old, it is not possible');
        }
    }
}