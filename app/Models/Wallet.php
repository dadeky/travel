<?php

namespace App\Models;

use App\Exceptions\Person\PersonIsNotActiveException;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wallet extends Model
{
    use HasFactory, HasUuids;

    public $attributes = [
        'name' => ''
    ];

    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * @throws PersonIsNotActiveException
     */
    public function changeName($name)
    {
        if (!$this->person->isActive()) throw new PersonIsNotActiveException();
        $this->setAttribute('name', $name);
        $this->save();
    }
}
