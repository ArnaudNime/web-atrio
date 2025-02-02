<?php

declare(strict_types=1);

namespace App\Presenter\Society;

use App\Entity\Read\Society\Society;

readonly class ListPresenter
{
    public function present(array $societies): array
    {
        return array_map(static function (Society $society) {
            return ['name' => $society->name];
        }, $societies);
    }
}