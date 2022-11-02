<?php

namespace App\Services\Person;

use App\Events\PersonCreated;
use App\Models\Person;

class CreatePersonService
{
    public function execute(CreatePersonRequest $request): void
    {
        $person = Person::create([
            'firstName' => $request->getFirstName(),
            'lastName' => $request->getLastName()
        ]);
        PersonCreated::dispatch($person);
    }
}
