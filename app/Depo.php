<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    public function Depo(){
        return $this->belongsToMany(Permission::class,'roles_permission');
    }

}
