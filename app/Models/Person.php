<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
