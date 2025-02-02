<?php

declare(strict_types=1);

namespace App\Controller\Person;

use App\Presenter\Person\ListPresenter;
use App\Repository\PersonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class GetPersonList extends AbstractController
{
    public function getList(PersonRepository $repository, ListPresenter $presenter): JsonResponse
    {
        try {
            $data = $presenter->present($repository->getList());

            return new JsonResponse($data);
        } catch (Throwable $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }

    public static function getDescription(): string
    {
        return 'Get all persons';
    }

}