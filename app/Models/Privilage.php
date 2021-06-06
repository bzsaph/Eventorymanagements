<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilage extends Model
{
    use HasFactory;
    public function privilages(){
        return $this->belongsToMany(User::class,'user_id');
    }
}
