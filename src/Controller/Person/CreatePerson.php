<?php

declare(strict_types=1);

namespace App\Controller\Person;

use App\BuilderFromPayload\Person\PersonToCreateBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Throwable;

class CreatePerson extends AbstractController
{
    public function create(
        EntityManagerInterface $entityManager,
        Request $request,
        PersonToCreateBuilder $builder
    ): JsonResponse {
        try {
            $createPerson = $builder->buildCreatePerson($request->getPayload()->all());
            $entityManager->persist($createPerson);
            $entityManager->flush();

            return new JsonResponse(['message' => 'success'], 201);
        } catch (Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public static function getDescription(): string
    {
        return 'Create a person';
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