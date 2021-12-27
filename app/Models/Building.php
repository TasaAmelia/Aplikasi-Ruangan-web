<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    // protected $guarded = ['id_gedung'];

    public function room(){
        return $this->hasMany(Room::class);
    }
}
