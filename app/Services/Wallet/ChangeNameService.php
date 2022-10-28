<?php

namespace App\Services\Wallet;

use App\Exceptions\Person\PersonIsNotActiveException;
use App\Models\Wallet;

class ChangeNameService
{
    /**
     * @param $id
     * @param $name
     * @return void
     * @throws PersonIsNotActiveException
     */
    public function execute($id, $name): void
    {
        Wallet::findOrFail($id)->changeName($name);
    }
}
