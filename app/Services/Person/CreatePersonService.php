<?php

namespace App\Services\Person;

use App\Models\Person;

class CreatePersonService
{
    public function execute(CreatePersonRequest $request)
    {
        Person::create([
            'firstName' => $request->getFirstName(),
            'lastName' => $request->getLastName()
        ]);
    }
}
