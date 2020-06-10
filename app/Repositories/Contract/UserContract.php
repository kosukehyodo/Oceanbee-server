<?php

namespace App\Repositories\Contract;

/**
 * Interface UserContract
 * @package App\Repositories\Contract
 */
interface UserContract
{
    public function create(array $data);

    public function first(string $token);
}
