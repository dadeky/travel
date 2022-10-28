<?php

namespace App\Models;

use App\Exceptions\Person\PersonIsNotActiveException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName', 'lastName'
    ];

    protected $attributes = [
        'active' => false
    ];

    public function activate(): void
    {
        $this->setAttribute('active', true);
        $this->save();
    }

    public function deactivate(): void
    {
        $this->setAttribute('active', false);
        $this->save();
    }

    public function isActive()
    {
        return $this->getAttribute('active');
    }

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    /**
     * @throws PersonIsNotActiveException
     */
    public function addWallet()
    {
        if (!$this->isActive()) throw new PersonIsNotActiveException();
        $this->wallets()->save(new Wallet());
    }
}
