<?php

namespace App\Services\Person;

use App\Exceptions\Person\PersonIsNotActiveException;
use App\Models\Person;
use Exception;

class DisplayWalletsService
{

    /**
     * @throws PersonIsNotActiveException
     */
    public function execute(DisplayWalletsRequest $request)
    {
        $person = Person::findOrFail($request->getId());
        if (!$person->isActive()) throw new PersonIsNotActiveException();
        return $person->wallets;
    }
}
