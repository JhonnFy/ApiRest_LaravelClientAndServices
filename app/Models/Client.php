<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Model
{
    use HasFactory;

        #AtributesTable
        protected $fillable = [
            'name',
            'email',
            'phone',
            'address'
        ];


    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class);
    }
}
