<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

        #AtributesTable
        protected $fillable = [
            'name',
            'description',
            'price'
        ];

    public function clients(): BelongsToMany
    {
        return $this->belongsToMany(Client::class);
    }
}
