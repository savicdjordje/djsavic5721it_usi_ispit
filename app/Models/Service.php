<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vozilo_id',
        'zaposleni_id',
        'admin_id',
        'status_id',
        'naziv',
        'opis',
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
            'vozilo_id' => 'integer',
            'zaposleni_id' => 'integer',
            'admin_id' => 'integer',
            'status_id' => 'integer',
        ];
    }

    public function vozilo(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function zaposleni(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function racuni(): HasMany
    {
        return $this->HasMany(Bill::class);
    }
}
