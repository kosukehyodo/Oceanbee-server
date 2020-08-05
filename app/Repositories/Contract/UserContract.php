<?php

namespace App\Repositories\Contract;

use Illuminate\Http\Request;

/**
 * Interface UserContract
 * @package App\Repositories\Contract
 */
interface UserContract
{
    public function create(array $data);

    public function first(string $token);
    
    public function update(Request $request, Int $id);
}
