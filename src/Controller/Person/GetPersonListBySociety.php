<?php

declare(strict_types=1);

namespace App\Controller\Person;

use App\Presenter\Person\ListPresenter;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class GetPersonListBySociety extends AbstractController
{
    public function getList(PersonRepository $repository, ListPresenter $presenter, int $societyId): JsonResponse
    {
        try {
            $data = $presenter->present(persons: $repository->getListBySociety($societyId));

            return new JsonResponse($data);
        } catch (Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public static function getDescription(): string
    {
        return 'Get the list of persons who has worked in a society';
    }
}