<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Toko extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama',
        'user_id',
        'profile',
        'alamat',
    ];

    protected function casts()
    {
        return [

        ];
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }



}
