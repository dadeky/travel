<?php

namespace App\Services\Person;

class TogglePersonActivationRequest
{
    private int $id;
    private bool $activate;

    public function __construct($id, $activate)
    {
        $this->id = $id;
        $this->activate = $activate;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function shouldBeActivated(): bool
    {
        return $this->activate;
    }
}
