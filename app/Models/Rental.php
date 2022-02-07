<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Rental extends Model
{
    use HasFactory, Notifiable;

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function building(){
        return $this->belongsTo(Building::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
