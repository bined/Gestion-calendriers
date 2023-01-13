<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    use HasFactory;

    public function events()
    {
        return $this->hasMany(Event::class,  'calender_id', 'id');
    }
}
