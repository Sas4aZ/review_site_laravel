<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function reviews(){
        return $this->belongsTo('App\Models\Review','review_id');
    }

}
