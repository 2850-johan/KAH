<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestation extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'duree',
        'statut',
        'user_id',
    ];

    /**
     * Intervenant assigné à la prestation.
     */
    public function intervenant(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
