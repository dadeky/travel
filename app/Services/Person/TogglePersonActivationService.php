<?php

namespace App\Services\Person;

use App\Models\Person;

class TogglePersonActivationService
{
    public function execute(TogglePersonActivationRequest $request)
    {
        $person = Person::findOrFail($request->getId());
        $request->shouldBeActivated() ? $person->activate() : $person->deactivate();
    }
}
