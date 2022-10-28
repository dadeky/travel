<?php

namespace App\Services\Person;

use App\Exceptions\Person\PersonIsNotActiveException;
use App\Models\Person;

class AddWalletService
{
    /**
     * @throws PersonIsNotActiveException
     */
    public function execute(AddWalletRequest $request)
    {
        $person = Person::findOrFail($request->getId());
        $person->addWallet();
    }
}
