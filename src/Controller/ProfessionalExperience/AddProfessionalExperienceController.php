<?php

declare(strict_types=1);

namespace App\Controller\ProfessionalExperience;

use App\BuilderFromPayload\ProfessionalExperience\ProfessionalExperienceToCreateBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class AddProfessionalExperienceController extends AbstractController
{
    public function add(
        EntityManagerInterface $entityManager,
        Request $request,
        ProfessionalExperienceToCreateBuilder $builder
    ): JsonResponse {
        try {
            $professionalExperience = $builder->buildProfessionalExperience($request->getPayload()->all());
            $entityManager->persist($professionalExperience);
            $entityManager->flush();

            return new JsonResponse(['message' => 'success'], 201);
        } catch (Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public static function getDescription(): string
    {
        return 'Add a professional experience to a person';
    }

    public static function getParams(): string
    {
        return json_encode([
            'firstname' => 'string',
            'last_name' => 'string',
            'birth_date' => 'string format (y-m-d)',
        ]);
    }
}