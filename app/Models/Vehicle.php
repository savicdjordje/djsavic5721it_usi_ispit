<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'klijent_id',
        'registarski_broj',
        'marka',
        'model',
        'godina_proizvodnje',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'klijent_id' => 'integer',
        ];
    }

    public function klijent(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
