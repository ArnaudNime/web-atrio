<?php

declare(strict_types=1);

namespace App\Controller\Person;

use App\Presenter\Person\PersonPresenter;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class GetPerson extends AbstractController
{
    public function get(
        int $personId,
        PersonRepository $repository,
        PersonPresenter $presenter
    ): JsonResponse {
        try {
            $data = $presenter->present($repository->getPerson($personId));

            return new JsonResponse($data);
        } catch (Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public static function getDescription(): string
    {
        return 'Get a person with his professional experience';
    }
}