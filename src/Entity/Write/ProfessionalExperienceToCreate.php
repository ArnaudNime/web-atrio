<?php

declare(strict_types=1);

namespace App\Entity\Write;

use Doctrine\ORM\Mapping as ORM;
use Exception;

#[ORM\Entity]
#[ORM\Table(name: "professional_experience")]
class ProfessionalExperienceToCreate
{
    use CreationDateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 50)]
    private string $job;

    #[ORM\Column]
    private string $startDate;

    #[ORM\Column]
    private ?string $endDate;

    #[ORM\Column]
    private int $personId;

    #[ORM\Column]
    private int $societyId;

    #[ORM\Column]
    private string $creation_date;

    /**
     * @throws Exception
     */
    public function __construct(
        string $job,
        string $startDate,
        ?string $endDate,
        int $personId,
        int $societyId,
    ) {
        $this->job = $job;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->personId = $personId;
        $this->societyId = $societyId;
        $this->creation_date = $this->getCreationDate();
    }
}