<?php

namespace App\Models;

use App\Models\Actors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    protected
    $guarded = [];

    public function actors()
    {
        return $this->hasMany(Actors::class);
    }

    public function images()
    {
        return $this->hasMany(Images::class);
    }
}
