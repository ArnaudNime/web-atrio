<?php

declare(strict_types=1);

namespace App\Presenter\Person;

readonly class ListPresenter
{
    public function __construct(private PersonPresenter $personPresenter)
    {
    }

    public function present(array $persons): array
    {
        return array_map(function ($person) {
            return $this->personPresenter->present($person);
        }, $persons);
    }
}