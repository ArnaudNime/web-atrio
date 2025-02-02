<?php

namespace App\BuilderFromPayload;

use InvalidArgumentException;

trait AssertParam
{
    public function assert(array $keys, array $data): void
    {
        foreach ($keys as $param) {
            if (!array_key_exists($param, $data) || empty($data[$param])) {
                throw new InvalidArgumentException("$param missing");
            }
        }
    }
}