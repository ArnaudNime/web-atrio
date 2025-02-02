<?php

declare(strict_types=1);

namespace App\Controller\Society;

use App\Presenter\Society\ListPresenter;
use App\Repository\SocietyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class GetSocietyList extends AbstractController
{
    public function getList(SocietyRepository $repository, ListPresenter $presenter): JsonResponse
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
        return 'Get all societies';
    }
}